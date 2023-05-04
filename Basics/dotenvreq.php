<?php

// We must call the autoload php script to help alleviate the pain of manually writing out each dependency we need
// the autoloader will, well... autoload any vendor dependencies we need after coming across some unknown method, namespace, class, etc, like below with Dotenv
require_once("vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
