<?php
session_start();

@$_SESSION['ideliminarUser'];
$response=null;
$response=@$_SESSION['ideliminarUser'];


header('Content-Type: application/json');
echo(json_encode($response));
?>