<?php
// Load in our autoloader so we can reference our custome classes
// Make sure to run composer dump-autoload in the terminal to generate the fresh autoloader
require_once __DIR__ . "/../vendor/autoload.php";
// require_once __DIR__ . "/Math.php";

// We can call the ArrayMath class which was stored within the App namespace
use App\ArrayMath;

$int_array = [1, 2, 3, 4, 5];
$float_array = [1.1, 2.2, 3.3, 4.4, 5.5];
$mix_array = [1, 2.2, 3, 4.4, 5];

// get sum of array
$sum = ArrayMath::doMath("add", ...$int_array);
echo "The sum of the int array is {$sum}" . "\n";
$sum = ArrayMath::doMath("add", ...$float_array);
echo "The sum of the float array is {$sum}" . "\n";
$sum = ArrayMath::doMath("add", ...$mix_array);
echo "The sum of the mix array is {$sum}" . "\n";

echo "---------------------------------------" . "\n";


// get the difference of array_pop
$diff = ArrayMath::doMath("subtract", ...$int_array);
echo "The difference of the int array is {$diff}" . "\n";
$diff = ArrayMath::doMath("subtract", ...$float_array);
echo "The difference of the float array is {$diff}" . "\n";
$diff = ArrayMath::doMath("subtract", ...$mix_array);
echo "The difference of the mix array is {$diff}" . "\n";
echo "---------------------------------------" . "\n";

// get the product of the array
$prod = ArrayMath::doMath("multiply", ...$int_array);
echo "The product of the int array is {$prod}" . "\n";
$prod = ArrayMath::doMath("multiply", ...$float_array);
echo "The product of the float array is " . round($prod, 1) . "\n";
$prod = ArrayMath::doMath("multiply", ...$mix_array);
echo "The product of the mix array is " . round($prod, 1) . "\n";
echo "---------------------------------------" . "\n";
