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

<p>PHP even has foreach loops for us! Yippee!</p>
<?php
$items = ["Orange Belly Wash", "Television", "Bananas"];

foreach ($items as $item) {
  echo "We have {$item} <br>";
}
?>