<?php

namespace App\Service;

use DateTime;

Class TraitementDate
{

    function getDayOnDate($date1) {
        // Create a DateTime object
        $date = new DateTime($date1);

        $day = $date->format('d');

        return $day ;

    }
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
            
            
            if ($date1->format('j') > 1) {
                // Si la date de début n'est pas le premier jour du mois, ajuster le nombre de jours
                // $nombreJours -= $date1->format('j') - 1;
                $nombreJours -= $date1->format('j');
            }

            if ($date1->format('m') == $date2->format('m')) {
                // Si le mois de début est le même que le mois de fin, ajuster le nombre de jours
                $nombreJours -= cal_days_in_month(CAL_GREGORIAN, $date2->format('m'), $date2->format('Y')) - $date2->format('j');
            }

            $array[$i]['nombreJours']      = $nombreJours ;

            $date1->modify('first day of next month');

            $i++ ;

        }
    
        return $array ;
    }

    function getDate15NbDay($date) {

        // Créer un objet DateTime à partir de la date fournie
        $dateObj = new DateTime($date);
    
        // Récupérer le mois et l'année de la date fournie
        $mois = $dateObj->format('m');
        $annee = $dateObj->format('Y');
    
        // Créer une nouvelle date au 15 du même mois
        $dateDu15 = new DateTime("$annee-$mois-15");
    
        // Obtenir le nombre de jours dans le mois de la date fournie
        $nombreJours = $dateDu15->format('t');
    
        return [
            'dateDu15' => $dateDu15,
            'nombreJours' => $nombreJours,
        ];

    }
    

} 