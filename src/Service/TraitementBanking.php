<?php

namespace App\Service;

use DateTime;

Class TraitementBanking
{

    function calcInterestEpr($datas) {
        
        $amount = round((\intval($datas['amount']) * (\intval($datas['rate'])/100) * \intval($datas["diffDate"])) / 360 , 2) ;

        return $amount ;
    }

    function calcInterestDat($datas) {
        
        $amount = round(\intval($datas['amount']) * (\floatval($datas['rate'])/100) * (\intval($datas["nbMonth"]) *30 ) / 360 , 2) ;

        return $amount ;
    }

} 