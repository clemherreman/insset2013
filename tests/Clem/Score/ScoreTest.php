<?php
namespace Clem\Test\Score\Test;

use Clem\Score\Score;

/**
 * Unit test for the Score class
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
    public function valid_scores()
    {
        return array(
            array(0,   'rgb(250,72,75)'),
            array(100, 'rgb(72,250,75)'),
            array(50,  'rgb(250,250,75)'),
        );
    }

    /** @dataProvider valid_scores */
    public function test_score_with_a_valid_number($number, $expectedColor)
    {
        $score = new Score($number);
        $color = $score->getScoreColor();
        $this->assertEquals($expectedColor, $color);
    }

    public function test_score_with_invalid_number()
    {
        $score = new Score(-1);
        $color = $score->getScoreColor();
        $this->assertEquals('rgb(181,181,181)', $color);
    }
}
