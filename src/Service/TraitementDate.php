<?php

namespace App\Service;

use DateTime;

Class TraitementDate
{

    function DayTwoDate($date1, $date2) {
        // Convertir les cha�nes de date en objets DateTime
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
    
        // Calculer la diff�rence entre les deux dates
        $interval = $datetime1->diff($datetime2);
    
        // R�cup�rer le nombre de jours � partir de l'objet d'intervalle
        return $interval->days;
    }

} 