<?php
// Working with variables
$firstVar = "Kareem";
$firstFunction = function ($firstParam) {
    echo "Hello {$firstParam}!";
};
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Basics">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PHP Basics</title>
	</head>

	<body>
		<h1>Todays Message is:</h1>
		<p><?php $firstFunction($firstVar);?></p>
	</body>

</html>