<?php

namespace App\Service;

use DateTime;

Class TraitementDate
{

    function nbMonthBetweenTwoDate($date1, $date2) {
        // Convertir les chaînes de date en objets DateTime
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);

        $diff = $datetime2->diff($datetime1);

        // Calculer le nombre total de mois en prenant en compte les années
        $nombreMois = $diff->y * 12 + $diff->m;
    
        return $nombreMois;
        
    }    

    function DayTwoDate($date1, $date2) {
        // Convertir les chaînes de date en objets DateTime
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
    
        // Calculer la différence entre les deux dates
        $interval = $datetime1->diff($datetime2);
    
        // Récupérer le nombre de jours à partir de l'objet d'intervalle
        return $interval->days;
    }

    function MonthYearsDate($date1, $date2) {
        $i = 0 ;
        $array[] = [];
       
    
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);
        

        // Itération sur chaque mois
        while ($date1 <= $date2) {
            $array[$i]["listMonthYears"]   = $date1->format('M Y');  // 'F' pour le nom du mois et 'Y' pour l'année

            $nombreJours               = $date1->format('t');         // 't' retourne le nombre de jours dans le mois
            $array[$i]['nombreJours']      = $nombreJours ;
    
            $date1->modify('first day of next month');

            $i++ ;

        }
    
        return $array ;
    }

} 