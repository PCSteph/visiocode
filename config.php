<?php
$host = "192.168.1.134";
$base = "visiocode";
$logindb = "remote";
$passdb = "Superman26$";

// Connexion à la base de données avec mysqli
$conn = new mysqli($host, $logindb, $passdb, $base);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Connexion réussie
echo "Connexion réussie à la base de données.";
?>
