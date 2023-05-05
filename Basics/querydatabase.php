<?php
require_once("databaseclient.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="w'id'th=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Here we can query the users in our test.FirstTable table</h2>
  <ul>
    <?php
    $dummy_users = [
      (object) ['id' => '903483948vj320482h3', 'username' => 'Kareem', 'age' => 54, 'clicks' => 12],
      (object) ['id' => 'saf09as7v90asv789sa', 'username' => 'Sunni', 'age' => 12, 'clicks' => 100],
      (object) ['id' => 'sa9s87bsa98b7as98fs', 'username' => 'Eddie', 'age' => 32, 'clicks' => 9983],
    ];


    $real_users = $sqli_client->query("SELECT * FROM users");

    foreach ($real_users as $user) {
      // I don't like this... there should be a cleaner way to generate out html blocks in PHP
      echo "<li>
              <div id={$user['id']} class='user-block'>
                <h3>{$user['username']}</h3>
                <p>Age: {$user['age']}</p>
                <p>Clicks: {$user['clicks']}</p>
              </div>
            </li>";
    }

    mysqli_close($sqli_client);
    ?>
  </ul>

</body>

</html>