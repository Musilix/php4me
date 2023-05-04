<?php
echo "<h2>There's several little tidbits when working with arrays that are good to know</h2>";

$arr = [];
$arr_alt = array();
$ass_arr = [];

// ==========================================================================================================================================

// We can append to an array by using the [] operator
for ($i = 0; $i < 10; $i++) {
  $arr[] = $i;
  array_push($arr_alt, $i, "extra");
}

// We can pop from the top (rightmost of array) from an array by using the array_pop() method
// for ($i = 0; $i < 5; $i++) {
//   array_pop($arr);
// }

// We can pop from bottom (leftmost of array) from an array by using the array_shift() method
for ($i = 0; $i < 5; $i++) {
  array_shift($arr);
}

// ==========================================================================================================================================

// We can set up an associative array by using the => operator
for ($i = 0; $i < 10; $i++) {
  $ass_arr[$i] = $i ** 2;
}

// And then we can keys and values with other types of loops
echo "<b><u>Printing an Associative Array:</u></b> <br>";
foreach ($ass_arr as $key => $val) {
  echo "Key: {$key} Value: {$val} <br>";
}
echo "<br>";

echo "<b><u>Printing Keys of Associative Array: </u></b> <br>";
foreach (array_keys($ass_arr) as $key) {
  echo "Key: {$key} <br>";
}
echo "<br>";

echo "<b><u>Printing Values of Associative Array: </u></b> <br>";
foreach (array_values($ass_arr) as $val) {
  echo "Value: {$val} <br>";
}
echo "<br>";


// ==========================================================================================================================================
// Possible methods for printing out an array
// var dump has a bit more information, but print_r is a bit more human readable
// both suck though
echo "<b><u>print_r method: </u></b><br>";
echo print_r($arr);
echo "<br><br>";
echo print_r($arr_alt);
echo "<br><br>";

echo "<b><u>var_dump method: </u></b> <br>";
echo var_dump($arr);
echo "<br><br>";
echo var_dump($arr_alt);
echo "<br><br>";
