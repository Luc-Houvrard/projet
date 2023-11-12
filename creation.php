<?php
include 'header.php';
$success = "";
$error = "";
session_start();

if ($_POST){

$titre = $_POST['Titre'];
$sujet = $_POST['Sujet'];
$contenue = $_POST['Contenue'];
$id = $_SESSION['id'];

$titre = htmlspecialchars($titre);
$sujet = htmlspecialchars($sujet);
$contenue = htmlspecialchars($contenue);

if ($titre !== ' ' || $sujet !== ' ' || $contenue !== ' '){
$stmt = $conn->prepare('INSERT INTO article (Titre, Sujet, Contenue,Id_Utilisateur) VALUES (:titre, :sujet, :contenue,:id);');

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':sujet', $sujet);
        $stmt->bindParam(':contenue', $contenue);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $success = "Votre article a bien été publier";
      }else{
  $error= "L'un des champs n'est pas rempli";
}}
?>

<form action="" method="post" class="container mt-3">

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="Titre" placeholder="Entrer Titre" name="Titre" require>
    <label for="email">Titre</label>
  </div>
  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="Sujet" placeholder="Entrer Sujet" name="Sujet" require>
    <label for="email">Sujet</label>
  </div>

  <div class="mb-3 mt-3">
      <label for="comment">Contenu :</label>
      <textarea class="form-control" rows="5" id="Contenue" name="Contenue" require></textarea>
    </div>
    <?= "<p class='text-danger'>$error</p>"?>
    <?= "<p class=\"text-success\">$success</p>"?>
  <button type="submit" class="btn btn-primary">Créer l'article</button>
</form>


<?php
include 'footer.php';
?>