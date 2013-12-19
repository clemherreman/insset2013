<?php
/**
 * @author Timothée Martin <timothee@widop.com>
 */ 

require_once(__DIR__.'/../vendor/autoload.php');

use Clem\Puissance4\Grille;
use Clem\Puissance4\Piece;

$grille = new Grille();

$grille->addPiece(new Piece('R'), 4);
$grille->addPiece(new Piece('J'), 0);
$grille->addPiece(new Piece('R'), 1);
$grille->addPiece(new Piece('J'), 1);
$grille->addPiece(new Piece('R'), 2);
$grille->addPiece(new Piece('J'), 2);
//$grille->addPiece(new Piece('R'), 3);
?>

<?php echo $grille->afficher() ?>

<?php echo $grille->estGagne() ? 'Gagne !' : 'En cours'  ?>

