<?php
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('path/to/firebase_credentials.json');
$auth = $factory->createAuth();
?>
