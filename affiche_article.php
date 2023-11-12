<?php
$sql = "SELECT * FROM article";
$state = $conn->query($sql);
// Utiliser une boucle pour parcourir tous les résultats
while ($row = $state->fetch(PDO::FETCH_ASSOC)) {

    echo '<div class="row bg-light" id= "article">
    <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="" class="col-sm-4 float-start img-fluid">
    <div class="flex-wrap col-sm-6">
    <h3>' . $row['Titre'] . '</h3>
    <p class="col-sm-6">' . $row['Contenue'] . '</p>
    </div>
    </div>';

}