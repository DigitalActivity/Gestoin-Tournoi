<?php

require_once("phpFiles/Tournoi.php");
require_once("phpFiles/Match.php");

/***
 * Class BD base de données connection, sauvegarder et charger les données
 */
class BD
{
    // Info de la base de données
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password =	'';
    private static $db = 'tournoiphp';
    private static $conn;

    /***
     * Connecter la base de données
     */
    private static function connecter()
    {
        self::$conn = new mysqli(self::$host, self::$user, self::$password, self::$db);

        if (self::$conn->connect_error) {
            die (self::$conn->connect_error);
        }

        $query = "SET NAMES utf8";
        $result	= self::$conn->query($query);
        if	(! $result)	{
            die (self::$conn->error);
        }
    }

    /***
     * Fermer la connection à la base des données
     */
    private static function deconnecter()
    {
        self::$conn->close();
    }

    /***
     * Sauvegarder un match dans la base de données
     *
     * @param Match $p_match Le match à ajouter
     */
    public static function sauvegarderMatch($p_match)
    {
        // Preparer la requete SQL
        $sql = "INSERT INTO matches (
                      nom_receveurs, 
                      nom_visiteurs, 
                      score_receveurs, 
                      score_visiteurs) 
                    VALUES (?, ?, ?, ?)";
        // Verifier que le match en parametre est valide
        if (isset($p_match) && is_a($p_match, 'Match')) {
            // Connecter
            self::connecter();
            // prepare and bind
            $stmt = self::$conn->prepare($sql);
            $stmt->bind_param("ssii",
                                $p_match->getReceveurNom(),
                                $p_match->getVisiteurNom(),
                                $p_match->getScoreReceveur(),
                                $p_match->getScoreVisiteur()
            );
            // Executer la requete
            $stmt->execute();
            // Fermer le prepared statement
            $stmt->close();
            // Fermer la connexion bd
            self::deconnecter();
        }
    }

    /**
     * Obtenir le tournoi avec la liste des matches
     *
     * @return Tournoi Le tournoi avec tous les matches
     */
    public static function chargerTournoi()
    {
        // Requete SQL pour chercher tous les matches
        $sql = "SELECT  nom_receveurs, 
                        nom_visiteurs, 
                        score_receveurs, 
                        score_visiteurs 
                  FROM matches";
        // Connecter la bd
        self::connecter();
        // resultat de la requete
        $result = self::$conn->query($sql);
        // Créer nouveau tournoi
        $tournoi = new Tournoi();
        // lire le resultat lign par ligne
        if ($result && $result->num_rows > 0) {
            // Ajouter les matches dans le tournoi
            while($row = $result->fetch_assoc()) {
                $match = new Match($row["nom_receveurs"], $row["nom_visiteurs"]);
                $match->setScoreReceveur($row["score_receveurs"]);
                $match->setScoreVisiteur($row["score_visiteurs"]);
                $tournoi->ajouterMatch($match);
            }
        }
        // Deconnecter
        self::deconnecter();
        return $tournoi;
    }
}
