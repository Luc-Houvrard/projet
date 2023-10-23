<?php
include 'header.php';
$error = "";
$success = "";


if ($_POST) {
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
      $error = "Votre email est déjas utiliser";
  } else {
  
      if ($password === $password2) {
  
          $password = password_hash($password, PASSWORD_DEFAULT);
  
          $stmt = $conn->prepare('INSERT INTO utilisateur (Pseudo, E_mail, Mot_de_passe) VALUES (:pseudo, :email, :mdp);');
  
          $stmt->bindParam(':pseudo', $pseudo);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':mdp', $password);
          $stmt->execute();

        $success = "Votre compte est créer vous aller être rediriger";
  
      }else {
          $error = "Les mot de passe ne sont pas identique";
      }
  }
}



?>

  <form action="" method="post" class="container mt-3">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="pseudo" placeholder="Entrer votre pseudo" name="pseudo">
      <label for="pseudo">Pseudo</label>
    </div>

    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
      <label for="email">Email</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      <label for="pwd">Password</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd2">
      <label for="pwd">Password</label>
    </div>
    <?= "<p class='text-danger'>$error</p>"?>
    <?= "<p class=\"text-success\">$success</p>"?>
    <button type="submit" class="btn btn-primary">Primary</button>
  </form>


<?php
include 'footer.php';
?>