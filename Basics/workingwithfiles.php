<?php
$testfile_n = "public/testfile.txt";
$testfile_n2 = "public/alphabet.txt";

// We can open a file w/ our basic r, w, and a, where r is read, w is write, and a is append
// We can also use r+ to read and write, w+ to write and read, and a+ to append and read
$testfile = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reading and Writing to Files</title>
</head>

<body>
  <h2>Welcome, Friend. I am sensing a file in your future.</h2>
  <h3>Let me find it for you... I'm searching for a file called <u><?php echo $testfile_n ?></u></h3>
  <p>Now let's see if I can open it...</p>
  <?php
  // We can call die() alongside the or operator for immediate closure. I haven't seen the use of that explicit or operator before
  // $testfile = fopen($testfile_n, "r+") or die("I couldn't open your file, friend.");

  try {
    if (!file_exists($testfile_n)) {
      throw new Exception("The file does not exist");
    }

    $testfile = fopen($testfile_n, "r+");
    echo "I could open it! Let's see, it says: <br>";

    // use feof() to detect if our ptr is at the end of the file yet
    while (!feof($testfile)) {
      // use fgets to read a line/sentence from a file
      echo fgets($testfile) . "<br>";
    }

    fclose($testfile);
  } catch (Exception $e) {
    echo "I couldn't open your file, friend. " . $e->getMessage() . ".";
  }


  ?>

  <h3>I also feel like reading from <u><?php echo $testfile_n2 ?></u></h3>
  <p>Let's take a look. It seems to say:</p>

  <?php
  try {
    if (!file_exists($testfile_n2)) {
      throw new Exception("The file does not exist");
    }

    $alphabet_test_file = fopen($testfile_n2, "r+");

    while (!feof($alphabet_test_file)) {
      $char = fgetc($alphabet_test_file);

      if (in_array(strtolower($char), ["z", ""])) {
        echo $char;
      } else {
        echo $char . " - ";
      }
    }
  } catch (Exception $e) {
  }

  ?>
</body>

</html>