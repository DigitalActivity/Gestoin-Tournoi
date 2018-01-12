<?php

/**
 * Contient l'information des rencontres, Noms equipes et scores
 */
class Match
{
    /**
     * @var string Nom des visiteurs
     */
    private $m_visiteur;
    /**
     * @var string Nom des receveurs
     */
    private $m_receveur;
    /**
     * @var int Score visiteurs
     */
    private $m_scoreVisiteur;
    /**
     * @var int Score visiteurs
     */
    private $m_scoreReceveur;
	
    /**
	 * Initialise la class avec les données en parametres
     *
	 * @param string $p_receveurs Nom receveurs
	 * @param string $p_visiteurs Nom visiteurs
	 */
    public function __construct($p_receveurs, $p_visiteurs)
    {
        if (isset($p_receveurs)) {
            $this->m_receveur =	$p_receveurs;
        } else {
            $this->m_receveur =	"";
        }

        if (isset($p_visiteurs)) {
            $this->m_visiteur =	$p_visiteurs;
        } else {
            $this->m_visiteur = "";
        }
    }
    
	/**
	 * Obtenir nom receveurs
	 */
    public function getReceveurNom()
    {
        return $this->m_visiteur;
    }
	
	/**
	 * Obtenir nom visiteurs
	 */
    public function getVisiteurNom()
    {
        return $this->m_receveur;
    }
	
	/**
	 * Obtenir score receveurs
	 */
    public function getScoreReceveur()
    {
        return $this->m_scoreReceveur;
    }
	
	/**
	 * Obtenir score visiteurs
	 */
    public function getScoreVisiteur()
    {
        return $this->m_scoreVisiteur;
    }

    /**
     * Definir score visiteurs
     *
     * @param int $p_score Score visiteurs
     */
    public function setScoreVisiteur($p_score)
    {
        $this->m_scoreVisiteur = $p_score;
    }

    /**
     * Definir score receveurs
     *
     * @param int $p_score Score receveurs
     */
    public function setScoreReceveur($p_score)
    {
        $this->m_scoreReceveur = $p_score;
    }
}
