<?php
// $get_details = $_GET["field_name"];
// echo $_POST["username"];
// echo $_POST["password"];

$item = "Cell Globules";
$price = 0.99;
$item_qt = $_POST["quantity"];

$cost = $price * $item_qt;

if ($item_qt) {
  echo "You have ordered $item_qt $item at $$price each for a total of $$cost.";
}
