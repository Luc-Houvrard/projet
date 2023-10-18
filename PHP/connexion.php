<?php
include '../connexionBDD.php';

$email = $_POST['email'];
$mdp = $_POST['pswd'];

// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare('SELECT Mot_de_passe FROM utilisateur WHERE E_mail = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch( PDO::FETCH_ASSOC);

if (password_verify($mdp, $row['Mot_de_passe'])) {
    echo 'connected';
} else {
    echo 'error';
}
?>