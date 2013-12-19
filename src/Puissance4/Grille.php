<?php

namespace Puissance4;

/**
 * Représente la grille qui contiendra les Pièces.
 *
 * @author Timothée Martin <timothee@widop.com>
 */
class Grille
{
    /**
     * @var array Un tableau a deux dimensions représentant la grille.
     */
    private $tableau;

    /**
     * Constructor : Initialise la grille.
     */
    public function __construct()
    {
        $this->tableau = array();

        for ($i=0; $i<7; $i++) {
            $this->tableau[$i] = array();

            for ($j=0; $j<6; $j++) {
                $this->tableau[$i][$j] = null;
            }
        }
    }

    /**
     * Sets the Grille.
     *
     * @param array $tableau The Grille.
     *
     * @return \Puissance4\Grille
     */
    public function setTableau($tableau)
    {
        $this->tableau = $tableau;

        return $this;
    }

    /**
     * Gets the Grille.
     *
     * @return array
     */
    public function getTableau()
    {
        return $this->tableau;
    }

    /**
     * Ajoute une pièce dans une des colonnes de la grille.
     *
     * @param \Puissance4\Piece $piece         La pièce à ajouter.
     * @param int               $numeroColonne Le numéro de la colonne où ajouter la pièce (indexé à 0).
     *
     * @return bool TRUE si l'ajout à réussi, FALSE sinon.
     */
    public function addPiece($piece, $numeroColonne)
    {
        $i = 0;
        while ($this->tableau[$numeroColonne][$i] !== null && $i < 6) {
            $i++;
        }

        if ($i === 6) {
            return false;
        }

        $this->tableau[$numeroColonne][$i] = $piece;

        return true;
    }

    /**
     * Affiche la grille à la manière d'un ASCII Art
     *
     * @return string
     */
    public function afficher()
    {
        $display = "   0 1 2 3 4 5 6\n";

        for ($ligne = 5; $ligne >= 0; $ligne--) {
            $display = $display.$ligne.' ';

            for ($colonne = 0; $colonne < 7; $colonne++) {
                $piece = $this->tableau[$colonne][$ligne];
                if ($piece !== null) {
                    $caractereCouleur = $piece->getCouleur();
                } else {
                    $caractereCouleur = ' ';
                }

                $display = $display.'|'.$caractereCouleur;
            }

            $display = $display."|\n";
        }

        $display .= "_________________\n";

        return $display;
    }

    public function estGagne()
    {
        for($col = 0; $col < 7; $col++) {
            for($ligne = 0; $ligne < 6; $ligne++) {
                $gagne = $this->verifierCase($col, $ligne);

                if ($gagne === true) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Pour une case donnée, vérifie si il y a 3 piece de même
     * couleur en ligne ou en diagonale autour.
     *
     * @param int $col   Index de la colonne de la case
     * @param int $ligne Index de la ligne de la case
     *
     * @return bool True il y a bien des pièces de même couleur,
     *              False sinon.
     */
    private function verifierCase($col, $ligne)
    {
        $nbColonne = 4;
        $nbLignes = 3;
        // A droite
        if ($col < $nbColonne) {
            if (
                $this->tableau[$col][$ligne] !== null &&
                $this->tableau[$col + 1][$ligne] !== null &&
                $this->tableau[$col + 2][$ligne] !== null &&
                $this->tableau[$col + 3][$ligne] !== null &&
                $this->tableau[$col][$ligne]->getCouleur() === $this->tableau[$col+1][$ligne]->getCouleur() &&
                $this->tableau[$col][$ligne]->getCouleur() === $this->tableau[$col+2][$ligne]->getCouleur() &&
                $this->tableau[$col][$ligne]->getCouleur() === $this->tableau[$col+3][$ligne]->getCouleur()
            ) {
                return true;
            }
        }




    }
}
