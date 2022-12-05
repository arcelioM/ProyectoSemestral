<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);
require_once "usuarioClas.php"; 
session_start();

@$_SESSION['idUsarioRol']; 
$response= null;
$response = @$_SESSION['idUsarioRol'];

header('Content-Type: application/json');
echo (json_encode($result));

   
   
    




?>