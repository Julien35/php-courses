<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d",
    $W, // width of the building.
    $H // height of the building.
);
fscanf(STDIN, "%d",
    $N // maximum number of turns before game over.
);
fscanf(STDIN, "%d %d",
    $X0,
    $Y0
);

$xBat = $X0;
$yBat = $Y0;
$xMin = 0;
$xMax = $W;
$yMin = 0;
$yMax = $H;


// error_log(var_export($W, true));
// error_log(var_export($H, true));

// game loop
while (TRUE)
{
    fscanf(STDIN, "%s",
        $bombDir // the direction of the bombs from batman's current location (U, UR, R, DR, D, DL, L or UL)
    );

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    
    // You really shouldn't need to create your own 2D array to store all of the values. 
    // Just try to work in terms of coordinates. 
    // You don't need to keep track of every spot you've checked, 
    // just the boundaries of where you've checked, 
    // which you can do with just a few integers!

    switch ($bombDir) {
        case "U":
            $xMin = $xBat;
            $xMax = $xBat;
//            $yMin = $yMin;
            $yMax = $yBat;

            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "UR":
            // (2,5)
            $xMin = $xBat;
//            $xMax = $xMax;
//            $yMin = $yMin;
            $yMax = $yBat;

            $xBat = bisectionSearch($xMin, $xMax);
            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "R":
            $xMin = $xBat;
//            $xMax = $xMax;
            $yMin = $yBat;
            $yMax = $yBat;

            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "DR":
            $xMin = $xBat;
//            $xMax = $xMax;
            $yMin = $yBat;
//            $yMax = $yMax;

            $xBat = bisectionSearch($xMin, $xMax);
            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "D":
            $xMin = $xBat;
            $xMax = $xBat;
            $yMin = $yBat;
//            $yMax = $yMax;

            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "DL":
//            $xMin = $xMin;
            $xMax = $xBat;
            $yMin = $yBat;
//            $yMax = $yMax;

            $xBat = bisectionSearch($xMin, $xMax);
            $yBat = bisectionSearch($yMin, $yMax);
            break;
        case "L":
//            $xMin = $xMin;
            $xMax = $xBat;
            $yMin = $yBat;
            $yMax = $yBat;

            $xBat = bisectionSearch($xMin, $xMax);
            break;
        case "UL":
//            $xMin = $xMin;
            $xMax = $xBat;
//            $yMin = $yMin;
            $yMax = $yBat;


            $xBat = bisectionSearch($xMin, $xMax);
            $yBat = bisectionSearch($yMin, $yMax);
            break;
        default:
            break;
    }

    // the location of the next window Batman should jump to.
    echo("$xBat $yBat\n");
}

// bisection method
//(minCoord + maxCoord) / 2 
function bisectionSearch($minCoord, $maxCoord)
{
    return intval(($minCoord + $maxCoord) / 2);
}
?>