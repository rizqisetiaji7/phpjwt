<?php 
require_once __DIR__.'/vendor/autoload.php';

setcookie('RZQ-SESSION', 'LOGOUT');

header('Location: http://localhost/php-jwt/login.php');