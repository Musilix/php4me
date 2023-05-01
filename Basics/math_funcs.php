<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/main.css" type="text/css">

  <title>Calculate the Area of a Square</title>
</head>

<body>
  <section id="user-input-section">
    <div>
      <h2>Get the area of a square: </h2>
      <form action="index.php" method="POST" class="user-form">
        <div class="input-wrapper">
          <label for="edgeLength">Edge Length:</label>
          <input type="text" name="edgeLength" id="edge length" placeholder="Edge Length">
        </div>

        <input type="submit" value="Search">
      </form>
    </div>
  </section>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $edge = $_POST["edgeLength"];
  // $area = round($edge * $edge);
  // $area = abs($edge * $edge);
  // $area = ceil($edge * $edge);
  // $area = floor($edge * $edge);
  $area = number_format($edge * $edge, 2);


  echo "If the edge length is $edge, then the area of the square is $area";
}

?>