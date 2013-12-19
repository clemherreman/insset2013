<?php

namespace Puissance4;

/**
 * Représente une pièce de puissance à jouer sur la grille.
 *
 * @author Timothée Martin <timothee@widop.com>
 */
class Piece
{
    /**
     * @param string $couleur Couleur de la pièce.
     */
    public function __construct($couleur)
    {
        $this->setCouleur($couleur);
    }

	/**
	 * @var string La couleur de cette pièce.
	 */
	private $couleur;

    /**
     * Sets the Couleur.
     *
     * @param string $couleur The Couleur.
     *
     * @return \Puissance4\Piece
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Gets the Couleur.
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}
