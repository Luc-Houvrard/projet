<?php
include '../connexionBDD.php';

$pseudo = $_POST['pseudo'];

$email = $_POST['email'];
$password = $_POST['pswd'];
$password2 = $_POST['pswd2'];


// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare('SELECT Mot_de_passe FROM utilisateur WHERE E_mail = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch( PDO::FETCH_ASSOC);


if ($row) {
    echo "l'email est déjas utiliser ";
} else {

    if ($password === $password2) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare('INSERT INTO utilisateur (Pseudo, E_mail, Mot_de_passe) VALUES (:pseudo, :email, :mdp);');

        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $password);
        $stmt->execute();

    }else {
        echo "vos mot de passe ne corresponde pas";
    }
}