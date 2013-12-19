<?php
/**
 * @author Timothée Martin <timothee@widop.com>
 */ 

require_once('Grille.php');
require_once('Piece.php');

use Puissance4\Grille;
use Puissance4\Piece;

$grille = new Grille();

$grille->addPiece(new Piece('R'), 4);
$grille->addPiece(new Piece('J'), 0);
$grille->addPiece(new Piece('R'), 1);
$grille->addPiece(new Piece('J'), 1);
$grille->addPiece(new Piece('R'), 2);
$grille->addPiece(new Piece('J'), 2);
$grille->addPiece(new Piece('R'), 3);
?>

<?php echo $grille->afficher() ?>

<?php echo $grille->estGagne() ? 'Gagne !' : 'En cours'  ?>

