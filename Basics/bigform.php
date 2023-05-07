<?php

use Laravel\SerializableClosure\UnsignedSerializableClosure;

session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>You</title>
  <link rel="stylesheet" href="css/main2.css">
</head>

<body>
  <section id="splash-page-wrap">
    <div class="splash-grp">
      <h2>Please Fill in the Information Below</h2>
      <p>It'll help us get a better idea of you!</p>
    </div>

    <?php
    if (isset($_SESSION["errors"]) and $_SESSION["status"] === "error") {
      $errors = $_SESSION["errors"];
    }
    ?>

    <!-- Interesting way to conditional render html blocks with php -->
    <?php if (isset($_SESSION["errors"]) and $_SESSION["status"] === "error") : ?>
      <div id="errors-wrap">
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php elseif (isset($_SESSION["user"]) and $_SESSION["status"] === "success") : ?>
      <div id="success-wrap">
        <p>User information was submitted succesfully!</p>
      </div>
    <?php endif; ?>

    <div class=" splash-grp">
      <form id="user-dtl-form" action="formsubmit.php" method="POST">
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" placeholder="Enter your name">

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" placeholder="BigBo@gmail.com">

        <label for="sustenance">Sustenance:</label>
        <select name="sustenance" id="sustenance">
          <option value="">Choose some sustenance</option>
          <option value="Sea Monkey Slurpy">Sea Monkey Slurpy</option>
          <option value="Calcified Neurotransmitters">Calcified Neurotransmitters</option>
          <option value="Fungal Growth">Fungal Growth</option>
          <option value="Marbles">Marbles</option>
        </select>

        <p>Preferred Time of Day:</p>
        <input type="radio" name="time" value="Morning" id="morning">
        <label for="morning">Morning</label>

        <input type="radio" name="time" value="Afternoon" id="afternoon">
        <label for="afternoon">Afternoon</label>

        <input type="radio" name="time" value="Night" id="night">
        <label for="night">Night</label>



        <p>Who do you want to take with you?</p>
        <input type="checkbox" name="companion[]" id="flarbo" value="Flarbo, the Exacavator">
        <label for="flarbo">Flarbo, the Exacavator</label>

        <input type="checkbox" name="companion[]" id="blippy" value="Blippy, the Brain">
        <label for="blippy">Blippy, the Brain</label>

        <input type="checkbox" name="companion[]" id="shmorshi" value="Shmorshi, the Killer">
        <label for="shmorshi">Shmorshi, the Killer</label>

        <label for="age">How old are you?</label>
        <input type="number" id="age" name="age" min="18" max="99" placeholder="Age">

        <label for="about">Tell us a little bit about yourself:</label>
        <textarea id="about" name="about" placeholder="I love long walks on the moonlit beach"></textarea>

        <!-- help avoid CSRF with a unique token -->
        <input type="hidden" name="token" value="">
        <input type="submit" name="submit" id="submit" value="submit">
      </form>
    </div>
  </section>
</body>

</html>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["status"]);
unset($_SESSION["user"]);
?>