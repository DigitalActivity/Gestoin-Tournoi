<?php
// inclure les fichiers necessaires
require_once("phpFiles/Tournoi.php");
require_once("phpFiles/Match.php");
require_once("phpFiles/Utils.php");
require_once("phpFiles/BD.php");
?>

<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tournoi - Ajouter un match</title>
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
        <div class="col-xs-6">
            <h3>Ajouter des matches au tournoi</h3>
            <?php
            // Enregistrer le match
            if (isset($_POST['submit'])) {
                // Copier les valeurs du POST
                $nomReceveurs = $_POST[NOM_RECEVEURS];
                $nomVisiteurs = $_POST[NOM_VISITEURS];
                $scoreReceveurs = $_POST[SCORE_RECEVEURS];
                $scoreVisiteurs = $_POST[SCORE_VISITEURS];
                // Permet d'arreter quand une valeur n'est pas valide
                $continuer = true; // Plus beau que les conditions imbriquées

                // Verifier que les noms ne sont pas vides
                if (! Utils::valeurEstTextNonVide($nomReceveurs) ||
                    ! Utils::valeurEstTextNonVide($nomVisiteurs)) {
                    $continuer = false;
                }

                // Verifier que les deux equipes sont differentes
                if ($continuer && $nomReceveurs == $nomVisiteurs) {
                    echo "<div class='alert alert-warning'>" . MESSAGE_MEME_EQUIPE . "</div>";
                    $continuer = false;
                }

                // Verifier que les scores sont saisies et ont des valeurs numeriques
                if ($continuer &&
                    ! Utils::valeurEstNumerique($scoreReceveurs) ||
                    ! Utils::valeurEstNumerique($scoreVisiteurs)) {
                    $continuer = false;
                }

                // Enregistrer le match si toutes les données sont valides
                if ($continuer) {
                    // créer le nouveau match
                    $match = new Match($nomReceveurs, $nomVisiteurs);
                    $match->setScoreReceveur($scoreReceveurs);
                    $match->setScoreVisiteur($scoreVisiteurs);
                    // Ajouter au tournoi
                    BD::sauvegarderMatch($match);
                    // Afficher message succes
                    echo "<div class='alert alert-success'>". MESSAGE_AJOUT_SUCCESS . "</div>";
                    // Vider POST en cas de succes pour ne pas ajouter le même match deux fois
                    $_POST = array();
                    $nomReceveurs = null;
                    $nomVisiteurs = null;
                    $scoreReceveurs = null;
                    $scoreVisiteurs = null;
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form action="ajouter.php" method="post">
                <div id="receveurs" class="col-xs-12 col-sm-6">
                    <div class="col-xs-12">
                        <h4>Receveurs: </h4>
                        <?php
                        echo "<select name='" . NOM_RECEVEURS . "'>";
                        echo "<option value=''>Equipe receveurs</option>";
                        // Créer dropdown avec les noms des equipes
                        foreach(Tournoi::EQUIPES as $equipeNom) {
                            echo "<option value='$equipeNom'";
                            if (isset($nomReceveurs) && $nomReceveurs == $equipeNom) {
                                echo " selected";
                            }
                            echo ">" .$equipeNom . "</option>";
                        }
                        echo "</select>";

                        // Avertir si le nom receveurs a une valeur vide
                        if (isset($nomReceveurs) && ! Utils::valeurEstTextNonVide($nomReceveurs)) {
                            echo "<span class='alert-warning'> " . MESSAGE_NOM_RECEVEURS_INVALIDE . "</span>";
                        }
                        ?>
                    </div>
                    <div class="col-xs-12">
                        <span>Score: </span>
                        <?php
                        // Créer le input score
                        echo "<input type='text' size='3' name='" . SCORE_RECEVEURS . "'";
                        // Remplir le champs score quand les données n'ont pas été valides
                        if (isset($scoreReceveurs)) {
                            echo "value='". $scoreReceveurs ."'";
                        }
                        echo ">";

                        // Avertir si le score des receveurs une valeur non numerique ou vide.
                        if (isset($scoreReceveurs) && ! Utils::valeurEstNumerique($scoreReceveurs)) {
                            echo "<span class='alert-danger'> " . MESSAGE_SCORE_INVALIDE . "</span>";
                        }
                        ?>
                    </div>
                </div>
                <div id ="visiteurs" class="col-xs-12 col-sm-6">
                    <div class="col-xs-12">
                        <h4>Visiteurs: </h4>
                        <?php
                        echo "<select name='" . NOM_VISITEURS . "'>";
                        echo "<option value=''>Equipe visiteurs</option>";
                        // Créer dropdown avec les noms des equipes
                        foreach(Tournoi::EQUIPES as $equipeNom) {
                            echo "<option value='$equipeNom'";
                            if (isset($nomVisiteurs) && $nomVisiteurs == $equipeNom) {
                                echo " selected";
                            }
                            echo ">" .$equipeNom . "</option>";
                        }
                        echo "</select>";

                        // Avertir si le nom visiteurs a une valeur vide
                        if (isset($nomVisiteurs) && ! Utils::valeurEstTextNonVide($nomVisiteurs)) {
                            echo "<span class='alert-warning'> " . MESSAGE_NOM_VISITEURS_INVALIDE . "</span>";
                        }
                        ?>
                    </div>
                    <div class="col-xs-12">
                        <span>Score: </span>
                        <?php
                        // Créer le input score
                        echo "<input type='text' size='3' name='" . SCORE_VISITEURS . "'";
                        // Remplir le champs score quand les données n'ont pas été valides
                        if (isset($scoreVisiteurs)) {
                            echo "value='". $scoreVisiteurs ."'";
                        }
                        echo ">";

                        // Avertir si le score des visiteurs une valeur non numerique ou vide.
                        if (isset($scoreVisiteurs) && ! Utils::valeurEstNumerique($scoreVisiteurs)) {
                            echo "<span class='alert-danger'> " . MESSAGE_SCORE_INVALIDE . "</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center col-centered">
                        <hr />
                        <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
                        <a class="btn btn-primary " title="Retour" href="index.php">Retour</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center col-centered">
                <?php
                $tournoi = BD::chargerTournoi();

                if (sizeof($tournoi) == 0) {
                    echo MESSAGE_AUCUN_MATCH;
                } else {
                    $tournoi->afficher();
                }
                ?>
            </div>
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
