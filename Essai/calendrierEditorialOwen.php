<?php

function generateCalendar($start_date, $end_date, $events)
{
    $current_date = strtotime($start_date);
    $end_date = strtotime($end_date);
    $schedule = [];
    $event_index = 0;

    while ($current_date <= $end_date) {
        if (in_array(date('N', $current_date), [2, 4, 6])) { // Mardi, Jeudi, Samedi
            $schedule[date('Y-m', $current_date)][] = [
                'date' => date('Y-m-d', $current_date),
                'event' => $events[$event_index % count($events)]
            ];
            $event_index++;
        } else {
            $schedule[date('Y-m', $current_date)][] = [
                'date' => date('Y-m-d', $current_date),
                'event' => ''
            ];
        }
        $current_date = strtotime("+1 day", $current_date);
    }

    return $schedule;
}

function renderCalendar($schedule)
{
    $months = [
        "01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", "06" => "Juin", "07" => "Juillet",
        "08" => "Août", "09" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre"
    ];

    foreach ($schedule as $month => $days) {
        $month_name = $months[date('m', strtotime($month . '-01'))];
        echo "<div class='month'>";
        echo "<h3>$month_name " . date('Y', strtotime($month . '-01')) . "</h3>";
        echo "<div class='row'>";

        for ($i = 1; $i <= 31; $i++) {
            $date = $month . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $day_content = "";

            foreach ($days as $day) {
                if ($day['date'] == $date) {
                    $event_class = strtolower(explode(' ', $day['event'])[0]);
                    $day_content = "<div class='day $event_class'><strong>$i</strong><br><div>{$day['event']}</div></div>";
                    break;
                }
            }

            if ($day_content == "" && checkdate(date('m', strtotime($month)), $i, date('Y', strtotime($month)))) {
                $day_content = "<div class='day'><strong>$i</strong></div>";
            }

            echo $day_content;
        }

        echo "</div>";
        echo "</div>";
    }
}

$start_date = "2023-09-01";
$end_date = "2024-07-31";
$events = [
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de pelle 8T en action.",
    "Video MLE : Vidéo de pelle 15T en action.",
    "Newsletter MLE : Nouveaux outils disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de nos employés au travail.",
    "Video MLE : Vidéo de bulldozer en action.",
    "Newsletter MLE : Nouveaux engins disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de grue en action.",
    "Video MLE : Vidéo de nos employés en formation.",
    "Newsletter MLE : Nouveaux engins disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de chargeuse en action.",
    "Video MLE : Vidéo de nos équipements en maintenance.",
    "Newsletter MLE : Nouveaux engins disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de pelleteuse en action.",
    "Video MLE : Vidéo de nos employés utilisant des nouveaux équipements.",
    "Newsletter MLE : Nouveaux outils disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de pelle 20T en action.",
    "Video MLE : Vidéo de tractopelle en action.",
    "Newsletter MLE : Nouveaux engins disponibles ce mois-ci.",
    "Post MLE : Photos des chantiers avec notre matériel.",
    "Photo MLE : Vidéo de nos employés installant des équipements.",
    "Video MLE : Vidéo de nos équipements en action.",
    "Newsletter MLE : Nouveaux engins disponibles ce mois-ci."
];

$schedule = generateCalendar($start_date, $end_date, $events);
renderCalendar($schedule);
