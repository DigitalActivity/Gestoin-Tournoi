<?php
/* //Pour debug
error_reporting(E_ALL);
ini_set('display_errors', 1); */

// inclure les fichiers necessaires
require_once("phpFiles/Tournoi.php");
require_once("phpFiles/Match.php");
require_once("phpFiles/Utils.php");
require_once("phpFiles/BD.php");
//session_start();
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tournoi - List des matches</title>
    <meta name="description" content="PHP Exercice - Tournoi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/yrstyle.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center col-centered">
            <hr />
            <a class="btn btn-primary" title="Ajouter un match" href="ajouter.php">Ajouter un match</a>
            <hr />
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center col-centered">
            <h3>Matches du tournoi</h3>
            <?php
            $tournoi = BD::chargerTournoi();
            // Afficher tournoi
            if (sizeof($tournoi->getlistMatches()) == 0) {
                echo MESSAGE_AUCUN_MATCH;
            } else {
                $tournoi->afficher();
            }
            ?>
        </div>
    </div>
</div>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>
</html>
