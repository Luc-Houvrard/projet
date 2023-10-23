<?php
include 'header.php';
$success = "";

if ($_POST){

$titre = $_POST['Titre'];
$sujet = $_POST['Sujet'];
$contenue = $_POST['Contenue'];
$stmt = $conn->prepare('INSERT INTO article (Titre, Sujet, Contenue) VALUES (:titre, :sujet, :contenue);');

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':sujet', $sujet);
        $stmt->bindParam(':contenue', $contenue);
        $stmt->execute();
        $success = "Votre article a bien été publier";
}
?>

<form action="" method="post">

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="Titre" placeholder="Entrer Titre" name="Titre">
    <label for="email">Titre</label>
  </div>
  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="Sujet" placeholder="Entrer Sujet" name="Sujet">
    <label for="email">Sujet</label>
  </div>

  <div class="mb-3 mt-3">
      <label for="comment">Contenue:</label>
      <textarea class="form-control" rows="5" id="Contenue" name="Contenue"></textarea>
    </div>

    <?= "<p class=\"text-success\">$success</p>"?>
  <button type="submit" class="btn btn-primary">Primary</button>
</form>


<?php
include 'footer.php';
?>