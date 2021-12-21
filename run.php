<?php
error_reporting(1);
use Shiban\Instabot\Application;

require_once __DIR__."/vendor/autoload.php";

$app = new Application ();
$app->Theme();

$username = readline('Enter Username : ');
$password =  readline('Enter Password : ');
$sleep =  readline('Enter Sleep Time : ');
$proxy =  readline('Enter Proxy Address : ');

$app->run($username,$password,$proxy,$sleep);

