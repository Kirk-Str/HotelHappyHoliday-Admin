<?php
require __dir__ .'./vendor/autoload.php';

$user= new User();
$user->logout();

Redirect::to('./index.php');