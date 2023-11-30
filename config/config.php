<?php
// Informations de connexion Ã  la base de donnÃ©es
$host = "localhost"; // L'hÃ´te de la base de donnÃ©es (gÃ©nÃ©ralement "localhost")
$database = "projet"; // Le nom de la base de donnÃ©es que vous avez crÃ©Ã©e
$username = "root"; // Votre nom d'utilisateur MySQL
$password = "root"; // Votre mot de passe MySQL

// Connexion Ã  la base de donnÃ©es en utilisant PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // DÃ©finir le mode d'erreur PDO Ã  exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur
    die("Erreur de connexion Ã  la base de donnÃ©es : " . $e->getMessage());
}
?>
