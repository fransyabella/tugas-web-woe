<?php
try{
$host="localhost";
$username="root";
$password="";
$database="project";
$pdo = new PDO("mysql:host=$host;dbname=project", $username , $password);
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
    $error->getMessage();
}
