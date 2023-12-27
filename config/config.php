<?php

$host = "localhost"; 
$database = "projet"; 
$username = "root"; 
$password = ""; 

$pdo=null;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
