<?php

namespace App\Service;

Class Traitement 
{
    protected $traitementDate ;
    protected $traitementBanking ;

    public function __construct(TraitementDate $traitementDate , TraitementBanking $traitementBanking) {

        $this->traitementDate       = $traitementDate;
        $this->traitementBanking    = $traitementBanking;

    }
    function TraitementSimulator($datas)  {
        
        switch ($datas['product']) {
                
            case 'DAT':
                # code...
                $amount = [] ;

                $amount["interest"] = $this->TraitementDat($datas) ;

                $amount["totality"]    = $amount["interest"]['amount'] + $datas["amount"] ;

                return $amount ;

                break;

            case 'EPR':
                # code...
                $amountInterest = $this->TraitementEpr($datas) ; 
                
                break;
            
            default:
                # code...
                break;
        }
        
        return null ; 

    }

    function TraitementDat($datas) {
        $values = [] ;

        $datas["nbMonth"]   = $this->traitementDate->nbMonthBetweenTwoDate($datas["datedepot"] , $datas["datefin"]) ;
        
        // $amount = (\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($diffDate)) / 360 ;
        $values['nbMonth']  = $datas["nbMonth"] ;
        $values['amount']   = $this->traitementBanking->calcInterestDat($datas) ;

        return $values ;

    }

    function TraitementEpr($datas) {

        $monthYersDate = $this->traitementDate->MonthYearsDate($datas["datedepot"] , $datas["datefin"]) ;
        
        switch ($datas['interests']) {

            case 'Mensuel':
                # code...
                $this->TraitementEprMonth($datas , $monthYersDate) ;
                break;

            case 'Annuel':
                # code...
                $this->TraitementEprYears($datas , $monthYersDate) ;
                break;
            
            default:
                # code...
                break;
        }
        return null ; 

    }

    function TraitementEprMonth($datas , $listMonthYears) {
        
        // dd($datas , $listMonthYears) ;

        return null ; 
    }

    function TraitementEprYears($datas , $listMonthYears) {
        $amount[] = [] ;
        $amount["years"] = 0 ;

        $diffDate = $this->traitementDate->DayTwoDate($datas["datedepot"] , $datas["datefin"]) ;

        // $amount["years"] = (\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($diffDate)) / 360 ;

        for ($i=0; $i < \count($listMonthYears); $i++) { 
            # code...

            $monthYears = $listMonthYears[$i]['listMonthYears'] ;

            $amount[$i][ $monthYears] = round((\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($listMonthYears[$i]["nombreJours"]) )/360 , 2) ;
            
            $amount["years"] += $amount[$i][ $monthYears] ;

        }
        
        return $amount ; 
    }

}
