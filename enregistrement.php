<?php
include 'header.php';
$error = "";
$success = "";
if ($_POST) {
  $pseudo = $_POST['pseudo'];
  $email = $_POST['email'];
  $password = $_POST['pswd'];
  $password2 = $_POST['pswd2'];
  
  if ($pseudo !== "" || $email !== "" || $password !== "" || $password2 !== "") {
    // Use a prepared statement to avoid SQL injection
  $stmt = $conn->prepare('SELECT Mot_de_passe FROM utilisateur WHERE E_mail = :email');
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $row = $stmt->fetch( PDO::FETCH_ASSOC);
  
  if ($row) {
      $error = "Votre email est déjas utiliser";
  } else {
  
      if ($password === $password2) {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $stmt = $conn->prepare('INSERT INTO utilisateur (Pseudo, E_mail, Mot_de_passe) VALUES (:pseudo, :email, :mdp);');
  
          $stmt->bindParam(':pseudo', $pseudo);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':mdp', $password);
          $stmt->execute();

        $success = "Votre compte est créé vous aller être redirigé";
  
      }else {
          $error = "Les mots de passe ne sont pas identiques";
      }
  }
  } else {
    $error = "Le champ de pseudo, email ou mot de passe n'est pas rempli";
  }
}

?>

  <form action="" method="post" class="container mt-3">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="pseudo" placeholder="Entrer votre pseudo" name="pseudo" require>
      <label for="pseudo">Pseudo</label>
    </div>

    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" require>
      <label for="email">Email</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" require>
      <label for="pwd">Mot de passe</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pswd2" require>
      <label for="pwd">Mot de passe</label>
    </div>
    <p class='text-danger' id="error"></p>
    <?= "<p class='text-danger'>$error</p>"?>
    <?= "<p class=\"text-success\">$success</p>"?>
    <button type="submit" class="btn btn-primary">Enregistrement</button>
  </form>
<script src="JS/enregistrement.js"></script>

<?php
include 'footer.php';
?>