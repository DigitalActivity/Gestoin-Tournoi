<?php
// Noms des constantes pour les envois et reception du formulaire ajouter.php
define("NOM_RECEVEURS", "nomReceveurs");
define("NOM_VISITEURS", "nomVisiteurs");
define("SCORE_RECEVEURS", "scoreReceveurs");
define("SCORE_VISITEURS", "scoreVisiteurs");
// Messages à afficher selon le cas
define("MESSAGE_SCORE_INVALIDE", "Score doit être un numerique positive.");
define("MESSAGE_NOM_RECEVEURS_INVALIDE", "Il faut choisir l'équipe receveurs");
define("MESSAGE_NOM_VISITEURS_INVALIDE", "Il faut choisir l'équipe visiteurs");
define("MESSAGE_MEME_EQUIPE", "Une equipe ne peut pas jouer contre elle-même");
define("MESSAGE_AJOUT_SUCCESS", "Match ajouté avec succes");
define("MESSAGE_AUCUN_MATCH", "Aucun match dans ce tournoi.");

/**
 * Class fonctions utils
 */
class Utils
{
    /**
     * Verifier que valeur est numerique positive
     *
     * @param string $p_value champs à valider
     * @return bool Vrai si le champs est un numerique positive
     */
    public static function valeurEstNumerique($p_value)
    {
        if (isset($p_value) && $p_value != "" && ctype_digit($p_value)) {
            return true;
        }
        return false;
    }

    /**
     * Verifier que le parametre est un text non vide
     *
     * @param string $p_text Valeur à verifier
     * @return bool Vrai si le champs n'est pas vide, faut sinon
     */
    public static function valeurEstTextNonVide($p_text)
    {
        if (isset($p_text) && $p_text != "") {
            return true;
        }
        return false;
    }
}
