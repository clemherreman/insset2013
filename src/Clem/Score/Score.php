<?php
namespace Clem\Score;

/**
 * Score
 *
 * @author Clément Herreman <clement.herreman@gmail.com>
 */
class Score
{
    private $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    /**
     * Gets the score attribute.
     *
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Generate color code to display
     * @return string
     */
    public function getScoreColor()
    {
        if ($this->score === null) {
            return 'rgb(181,181,181)';
        }

        $b = 75;
        $g = -1;
        $r = -1;

        if ($this->score >= 0 && $this->score <= 50) {
            $r = 250;
            $g = ceil(72 + (((250-72)/50)*$this->score));
        } elseif ($this->score > 50 && $this->score <= 100) {
            $g = 250;
            $r = ceil(250 - (((250-72)/50)*($this->score-50)));
        }
        return sprintf("rgb(%s,%s,%s)", $r, $g, $b);
    }
}
