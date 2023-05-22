<?php
session_start();
require_once("databaseclient.php");

if (isset($_POST["submit"])) {
  // var_dump($_POST);
  try {
    [$user, $errors] = validate_form_data();

    if (count($errors) > 0) {
      // Generate a session ID for the user that holds their PK from the database
      $_SESSION["status"] = "error";
      $_SESSION["errors"] = $errors;

      // Redirect the user to the homepage
      header("Location: index.php?result=validation_error");
      die();
    } else {

      // Store the user in the database
      $res = saveUserToDB($user, $sqli_client);

      // Generate a session ID for the user that holds their PK from the database
      if ($res[0]) {
        $_SESSION["status"] = "success";
        $_SESSION["user"] = $user;

        // Redirect the user to the homepage
        header("Location:index.php?result=success");
        closeConnection();
        die();
      } else {
        $_SESSION["status"] = "error";
        $_SESSION["errors"] = [$res[1]];

        // Redirect the user to the homepage
        header("Location: index.php?result=db_error");
        closeConnection();
        die();
      }
    }
    // Set a cookie with an encrypted version of the session ID

  } catch (Exception $e) {
    echo "Something went wrong while submitting the form: {$e->getMessage()}";
  }
}

function validate_form_data(): array {
  $user = (object) [];
  $errors = [];
  // Name
  if (!empty($_POST["name"])) {
    $name = $_POST["name"];
    if (!ctype_alpha(str_replace(" ", "", $name))) {
      $errors[] = "Name must only contain letters";
    } else {
      $user->name = $name;
    }
  } else {
    $errors[] = "Name is required. Please re-enter it.";
  }

  // Email
  if (!empty($_POST["email"])) {
    $email = $_POST["email"];

    // We could also skip var declaration and just use filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Email is not valid";
    }

    $user->email = $email;
  } else {
    $errors[] = "Email is required. Please re-enter it.";
  }

  // Sustenenance Check
  if (!empty($_POST["sustenance"])) {
    $sustenance = $_POST["sustenance"];
    $valid_sustenance = ["Sea Monkey Slurpy", "Calcified Neurotransmitters", "Fungal Growth", "Marbles"];
    if (!in_array($sustenance, $valid_sustenance)) {
      $errors[] = "Sustenance provided is not valid";
    } else {
      $user->sustenance = $sustenance;
    }
  } else {
    $errors[] = "Sustenance is required. Select some sustenance";
  }

  // Time of Day
  if (!empty($_POST["time"])) {
    $time_of_day = $_POST["time"];
    $valid_times = ["Morning", "Afternoon", "Night"];

    if (!in_array($time_of_day, $valid_times)) {
      $errors[] = "Time of day is not valid";
    } else {
      $user->time = $time_of_day;
    }
  }

  // Companion
  if (!empty($_POST["companion"])) {
    $valid_companions = ["Flarbo, the Exacavator", "Blippy, the Brain", "Shmorshi, the Killer"];
    $companions = $_POST["companion"];

    foreach ($companions as $companion) {
      if (!in_array($companion, $valid_companions)) {
        $errors[] = "Companion is not valid";
        break;
      }
    }

    $user->companion = implode(" + ", $companions);
  }

  // Age
  if (!empty($_POST["age"])) {
    $age = (int) $_POST["age"];
    if (!ctype_digit($age) and ($age < 18 or $age > 100)) {
      $errors[] = "Age must be a number";
    } else {
      $user->age = $age;
    }
  } else {
    $errors[] = "Age is required. Please enter a valid age.";
  }


  // About
  if (!empty($_POST["about"])) {
    $about = htmlspecialchars($_POST["about"]);
    $user->about = $about;
  } else {
    $errors[] = "About is required. Please tell us just a wee bit about yourself!";
  }

  return [(object) $user, $errors];
}
