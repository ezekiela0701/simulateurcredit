<?php

namespace App\Service;

Class Traitement 
{
    protected $traitementDate ;

    public function __construct(TraitementDate $traitementDate) {

        $this->traitementDate = $traitementDate;

    }
    function TraitementSimulator($datas)  {
        
        switch ($datas['product']) {
                
            case 'DAT':
                # code...
                $amount = [] ;

                $amount["interest"] = $this->TraitementDat($datas) ;

                $amount["totality"]    = $amount["interest"] + $datas["amount"] ;

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
        
        $diffDate = $this->traitementDate->DayTwoDate($datas["datedepot"] , $datas["datefin"]) ;
       
        $amount = (\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($diffDate)) / 360 ;

        return $amount ;

    }

    function TraitementEpr($datas) {

        return null ; 

    }

}
