<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier Éditorial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .calendar {
            margin: 20px;
        }

        .month {
            margin-bottom: 20px;
        }

        .month h3 {
            background-color: #455A64;
            /* Couleur pour le titre du mois */
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .day {
            border: 1px solid #ddd;
            height: 150px;
            width: calc(100% / 7);
            /* 7 jours par semaine */
            box-sizing: border-box;
            padding: 5px;
            text-align: center;
            position: relative;
            background-color: white;
            margin-bottom: -1px;
            /* Removes the gap between rows */
            margin-right: -1px;
            /* Removes the gap between columns */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .day strong {
            position: absolute;
            top: 5px;
            left: 5px;
        }

        .post {
            background-color: #FF8A65;
            /* Couleur pour Post MLE */
        }

        .photo {
            background-color: #4DB6AC;
            /* Couleur pour Photo MLE */
        }

        .video {
            background-color: #7986CB;
            /* Couleur pour Video MLE */
        }

        .newsletter {
            background-color: #FFD54F;
            /* Couleur pour Newsletter MLE */
        }

        .day div {
            margin-top: 25px;
            font-size: 0.9em;
        }

        .legend {
            margin: 20px;
        }

        .legend div {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .legend span {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container calendar">
        <div class="legend">
            <div class="post"></div><span>Post MLE</span>
            <div class="photo"></div><span>Photo MLE</span>
            <div class="video"></div><span>Video MLE</span>
            <div class="newsletter"></div><span>Newsletter MLE</span>
        </div>
        <?php include 'calendrierEditorialOwen.php'; ?>
    </div>
</body>

</html>