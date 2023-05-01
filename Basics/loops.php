<?php
$x = 0;

while ($x < 10) {
  $x++;
  echo "{$x}<br>";
}
?>

<p>And we can go the other way too!</p>

<?php
for ($i = 10; $i > 0; $i--) {
  echo "{$i}<br>";
}
?>