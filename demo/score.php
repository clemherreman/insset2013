<?php
/**
 * @author Timothée Martin <timothee@widop.com>
 */ 

require_once(__DIR__.'/../vendor/autoload.php');

use Clem\Score\Score;

$scorePoint = empty($_GET['score']) ? null : $_GET['score'];
$score = new Score($scorePoint);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INSSET 2013 - Unit testing a score color</title>
  </head>
  <body>
    <style>
        body {
            width: 100%;
            height: 100%;
            background: <?php echo $score->getScoreColor() ?>;
        }
    </style>

    <div class="wall">
        <form method="get">
            <input type="text" name="score" value="<?php echo $scorePoint ?>" />
        </form>
    </div>
  </body>
</html>
