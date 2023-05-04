<?php

// req helper script for using env vars
require_once("dotenvreq.php");

echo "Environment Variable HOST: {$_ENV['HOST']} <br>";
echo "Environment Variable PORT: {$_ENV['PORT']} <br>";
echo "Environment Variable USERNAME: {$_ENV['USERNAME']} <br>";
echo "Environment Variable PASSWORD: {$_ENV['PASSWORD']} ";
