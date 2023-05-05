<?php

require_once("databaseclient.php");

try {
  if (!isset($_POST['submit'])) {
    throw new Exception("No form submitted");
  }

  $username = $_POST['username'];
  $age = $_POST['age'];

  // Default fields like clicks, id, and dates dont need to be proivided
  $sqli_client->query("INSERT INTO users (username, age) VALUES ('{$username}', {$age})");
  echo "<b><u>{$username} was succesfully created as a new user!</b></u> <br>";

  mysqli_close($sqli_client);
} catch (Exception $e) {
  echo "<b><u>There was an issue creating a new User:</u></b> <br> {$e} <br>";
}
