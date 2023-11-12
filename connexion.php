<?php
include 'header.php';
$error = "";
$success = "";

if ($_POST) {
$email = $_POST['email'];
$mdp = $_POST['pswd'];


// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare('SELECT Mot_de_passe,Id_Utilisateur FROM utilisateur WHERE E_mail = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch( PDO::FETCH_ASSOC);
if ($email !== "" || $mdp !== "") {
  
if (password_verify($mdp, $row['Mot_de_passe'])) {
    $success='Connecter';
    session_start();
    $_SESSION["id"] = $row['Id_Utilisateur'];
} else {
    $error= 'error';
}}else{
  $error = 'Le champ de mot de passe ou d\'email est vide';
}
}
?>

<form action="" method="post" class="container mt-3">

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" require>
    <label for="email">Email</label>
  </div>

  <div class="form-floating mt-3 mb-3">
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" require>
    <label for="pwd">Mot de passe</label>
  </div>
  <?= "<p class='text-danger'>$error</p>"?>
    <?= "<p class=\"text-success\">$success</p>"?>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>


<?php
include 'footer.php';
?>