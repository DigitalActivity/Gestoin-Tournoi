<?php

/**
 * Class Tournoi contient la liste des matches
 */
class Tournoi
{
    /**
     * @var array $m_listeMatches liste des matches
     */
    private $m_listeMatches = array();

    /**
     * Liste constante des equipes disponibles
     */
    const EQUIPES = array(
        'Real Madrid', 'FC Barcelone', 'Atletico Madrid', 'FC Valencia','Malaga',
        'Getafe', 'Betis', 'Villa Real', 'Seville', 'Celta Vigo', 'Espanyol'
    );

    /**
     * Initialise la class avec la list des matches en parametres
     *
     * @param array $p_listeMatches Liste des matches, laisser vide si aucun match
     */
    public function __construct($p_listeMatches = array())
    {
        // Verifier si parametre valide
        if(isset($p_listeMatches) && is_array($p_listeMatches)) {
            $this->m_listeMatches =	$p_listeMatches;
        } else {
            $this->m_listeMatches =	array();
        }
    }

    /**
     * Obtenir la liste des matches du tournoi
     *
     * @return array Liste de tous les matchs du tournoi
     */
    public function getlistMatches()
    {
        return $this->m_listeMatches;
    }

    /**
     * Definir la liste des matches
     *
     * @param array $p_listMatches liste des matches
     */
    public function setListMatches($p_listMatches)
    {
        $this->m_listeMatches = $p_listMatches;
    }

    /**
     * Ajouter un match au tournoi
     *
     * @param Match $p_matche le match à ajouter
     */
    public function ajouterMatch($p_matche)
    {
        array_push($this->m_listeMatches, $p_matche);
    }

    /**
     * Afficher tous les matches du tournoi
     */
    public function afficher()
    {
        // Commencer une table
        echo "<table class=" . "matches-table" . ">";

        // Definir couleur selon victoire ou defaite
        for ($row = 0; $row < count($this->m_listeMatches); $row++) {
            // Definir la couleur selon win ou lost
            if ($this->m_listeMatches[$row]->getScoreReceveur() > $this->m_listeMatches[$row]->getScoreVisiteur()) {
                $classColorReceveur = "win";
                $classColorVisiteur = "lost";
            } elseif ($this->m_listeMatches[$row]->getScoreReceveur() < $this->m_listeMatches[$row]->getScoreVisiteur()) {
                $classColorReceveur = "lost";
                $classColorVisiteur = "win";
            } else {
                $classColorReceveur = "draw";
                $classColorVisiteur = "draw";
            }
            // Nouvelle ligne
            echo "<tr>";
            echo "<td class=' . $classColorReceveur . '>" . $this->m_listeMatches[$row]->getReceveurNom() . "</td>";
            echo "<td class='score'>" . $this->m_listeMatches[$row]->getScoreReceveur() . "</td>";
            echo "<td class=' . $classColorVisiteur . '>" . $this->m_listeMatches[$row]->getVisiteurNom() . "</td>";
            echo "<td class='score'>" . $this->m_listeMatches[$row]->getScoreVisiteur() . "</td>";
            echo "</tr>";
        }
        // close the table
        echo "</table>";
    }
}
