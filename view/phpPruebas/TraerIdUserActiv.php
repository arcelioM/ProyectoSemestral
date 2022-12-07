<?php
session_start();

@$_SESSION['idActivarProduc'];
$response=null;
$response=@$_SESSION['idActivarProduc'];

header('Content-Type: application/json');
echo(json_encode($response));
?>