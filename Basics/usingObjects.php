<?php

// Working with variables
$first_var = "kareem";
$first_function = function ($first_param) {
	echo "Hello {$first_param}!";
};

$second_var = "1234";

// import User model
include "models/User/User.php";
$user = new User($first_var, $second_var);
$user_auth = $user->get_auth();
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
	<p><?php $first_function($first_var); ?></p>

	<p>
		<?php
		if ($user_auth) {
			echo "You're Authorized!";
		} else {
			echo "You're Not Authorized";
		}
		?>
	</p>
</body>

</html>