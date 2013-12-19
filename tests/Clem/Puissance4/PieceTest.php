<?php
namespace Clem\Test\Puissance4\Test;

use Clem\Puissance4\Piece;

/**
 * Unit test for the Piece class
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class PieceTest extends \PHPUnit_Framework_TestCase
{
    public function test_suite_is_working()
    {
        $a = new Piece('R');
        $this->assertNotNull($a);
    }

    public function test_setting_a_couleur_works()
    {
        $piece = new Piece('Rouge');

        $this->assertEquals($piece->getCouleur(), 'Rouge');
    }
}
