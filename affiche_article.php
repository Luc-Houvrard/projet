<?php

$sql = "SELECT * FROM article";
$state = $conn->query($sql);
// Utiliser une boucle pour parcourir tous les résultats
while ($row = $state->fetch(PDO::FETCH_ASSOC)) {

    echo '<div class="card" style="width:400px">' .
    '<img class="card-img-top" src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Card image" style="width:100%">' .
    '<div class="card-body">' .
    '<h4 class="card-title">' . $row['Titre'] . '</h4>' .
    '<p class="card-text">' . $row['Contenue'] . '</p>' .
    '<a href="#" class="btn btn-primary">See Profile</a>' .
    '</div>' .
    '</div><br>';
}