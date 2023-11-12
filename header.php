<?php include 'connexionBDD.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    #sticky-footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    
  <li class="nav-item">
      <a class="nav-link" href="index.php">Accueil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="creation.php">Création</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="enregistrement.php">Enregistrement</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="connexion.php">Connexion</a>
    </li>
    
  </ul>
</nav>