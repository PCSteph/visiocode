<?php
session_start();
require_once('./config.php');

// Connexion à la base de données
$conn = new mysqli($host, $logindb, $passdb, $base);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Préparation de la requête sécurisée
$stmt = $conn->prepare("SELECT id_login, login, prenom, nom, autorisation, valide, credit_classique, credit_visio FROM client WHERE login = ? AND password = ?");
$stmt->bind_param("ss", $_POST['login_connect'], $_POST['password_connect']);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    $acc = "false";
    $raison = "L'identifiant ou le mot de passe est erroné.";
} else {
    if ($data['valide'] === '0') {
        $_SESSION['id_login'] = $data['id_login'];
        $_SESSION['login'] = $data['login'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['autorisation'] = $data['autorisation'];
        $_SESSION['page_actuel'] = 'principal.php';
        $_SESSION['credit_classique'] = $data['credit_classique'];
        $_SESSION['credit_visio'] = $data['credit_visio'];

        // Mise à jour de la dernière connexion
        $update = $conn->prepare("UPDATE client SET derniere_connexion = ? WHERE id_login = ?");
        $timestamp = time();
        $update->bind_param("ii", $timestamp, $data['id_login']);
        $update->execute();

        $acc = "true";
    } else {
        $acc = "false";
        $raison = "Votre compte n'est pas activé. En cas de problème, vous pouvez contacter l'administrateur du site par email à l'adresse suivante : visiocode@free.fr";
    }
}

// Redirection avec message
echo "<script>";
if ($acc === "false") echo "alert(\"" . addslashes($raison) . "\");";
echo "var myloc = window.location.href;";
echo "var locarray = myloc.split(\"/\");";
echo "window.location.href = locarray[0] + '//' + locarray[2];";
echo "</script>";

// Fermeture des connexions
$stmt->close();
$conn->close();
?>
