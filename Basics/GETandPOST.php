<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/main.css" type="text/css">

  <title>Stink Form</title>
</head>

<body>
  <section id="user-input-section">
    <div>
      <h2>Retrieve a User</h2>
      <form action="submit_stink_form.php" class="user-form" method="POST">
        <div class="input-wrapper">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" placeholder="Username">
        </div>

        <div class="input-wrapper">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <input type="submit" value="Search">
      </form>
    </div>
  </section>

</body>

</html>

<?php
// stink form code
?>