<?php
require_once("dotenvreq.php");
$x = ($_ENV["DB"]) ? $_ENV["DB"] : "";
echo "Trying to connect to database <u><b>{$x}</b></u>...";

try {
  handleDBCreds();
  $host = $_ENV["HOST"];
  $port = $_ENV["PORT"];
  $DB = $_ENV["DB"];
  $user = $_ENV["USERNAME"];
  $pass = $_ENV["PASSWORD"];

  $sqli_client = new mysqli($host, $user, $pass, $DB, $port);

  echo "We connected successfully! <br>";
} catch (Exception $e) {
  echo "There was an error connecting to the database: <br> {$e->getMessage()} <br>";
}


function handleDBCreds()
{
  if (!isset($_ENV["HOST"])) {
    throw new Exception("No DB Host set in .env");
  } elseif (!isset($_ENV["PORT"])) {
    throw new Exception("No DB Port set in .env");
  } elseif (!isset($_ENV["USERNAME"])) {
    throw new Exception("No DB User set in .env");
  } elseif (!isset($_ENV["PASSWORD"])) {
    throw new Exception("No DB Password set in .env");
  }
}
