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
                $values = [] ;

                $values["interest"] = $this->TraitementDat($datas) ;

                $values["totality"]    = $values["interest"]['amount'] + $datas["amount"] ;

                return $values ;

                break;

            case 'EPR':
                # code...
                $values         = [] ;

                $values["amountInterest"] = $this->TraitementEpr($datas) ; 
                
                return $values ;
            
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
                return $this->TraitementEprMonth($datas , $monthYersDate) ;

                break;

            case 'Annuel':
                # code...
                return $this->TraitementEprYears($datas , $monthYersDate) ;

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
        $values[] = [] ;
        $amountYears = 0 ;

        $diffDate = $this->traitementDate->DayTwoDate($datas["datedepot"] , $datas["datefin"]) ;

        // $amount["years"] = (\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($diffDate)) / 360 ;

        for ($i=0; $i < \count($listMonthYears); $i++) { 
            # code...

            $monthYears = $listMonthYears[$i]['listMonthYears'] ;

            $values[$i]["amount"]    = round((\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($listMonthYears[$i]["nombreJours"]) )/360 , 2) ;
            $values[$i]["date"]      = $monthYears ;
            $values[$i]["nbDay"]     = $listMonthYears[$i]["nombreJours"] ;
            
            $amountYears += $values[$i]["amount"] ;

        }
        
        $values[0]['amountYears'] = $amountYears ;
        $values[0]['diffDate']    = $diffDate ;
        $values[0]['capital']     = $amountYears + $datas['amount'] ;

        return $values ; 
        
    }

}
