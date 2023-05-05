<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Using JSON Objects</title>

</head>

<body>
  <h2>We can also work with JSON too!</h2>
  <p>Say we have the following JSON object:</p>
  <pre id="json"></pre>
  <h2>We can send use this in our php code and parse it just the same</h2>

  <form action=<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="POST">

    <!-- We can use hidden fields to send data on a button press... ofc, dont put in credentials or keys -->
    <input type="text" id="name" placeholder="name" name="name" value="Kareem" hidden></input>
    <input type="text" id="age" placeholder="age" name="age" value="54" hidden></input>
    <input type="text" id="isMarried" placeholder="isMarried" name="isMarried" value="false" hidden></input>

    <input type="submit" name="submit" id="jsontophpbtn" value="Send JSON to PHP" />
  </form>


  <script>
    const main = async () => {
      let jsonElement = document.getElementById("json");
      let jsonObject = {
        name: "Kareem",
        age: 54,
        isMarried: false
      }

      jsonElement.textContent = JSON.stringify(jsonObject, null, 2);

      let submitJsonToPhpBtn = document.getElementById("jsontophpbtn");
      submitJsonToPhpBtn.addEventListener("click", async function() {
        fetch("index.php", {
          method: "POST",
          body: JSON.stringify(jsonObject)
        }).then(res => res.text()).then(body => console.log(body));

        // console.log(res);
      });
    }

    main();
  </script>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
  try {
    echo "We got a POST request! <br><br>";

    $name = $_POST["name"];
    $age = $_POST["age"];
    $isMarried = $_POST["isMarried"];

    echo "The content of the POST request was: <br> Name: {$name} <br> Age: {$age} <br> isMarried: {$isMarried} <br><br>";

    $jsonarr = createJSONObj($name, $age, $isMarried);
    echo "<b><u>PHP Parsed JSON:</u></b> ";
    var_dump(parseJSONObj($jsonarr));
  } catch (Exception $e) {
    echo "We got a POST request, but we weren't able to parse it";
  }
} else {
  echo "No POST request detected";
}


function createJSONObj(...$parameters)
{
  $jsonarr = [];
  foreach ($parameters as $key => $param) {
    $jsonarr["key" . strval($key)] = $param;
  }
  return json_encode($jsonarr);
}

function parseJSONObj($json)
{
  return json_encode($json, true);
}
?>