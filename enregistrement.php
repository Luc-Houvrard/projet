<?php
include 'header.php';
?>
<form action="PHP/Enregistrement.php" method="post">
  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="pseudo" placeholder="Entrer votre pseudo" name="pseudo">
    <label for="pseudo">Pseudo</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    <label for="email">Email</label>
  </div>

  <div class="form-floating mt-3 mb-3">
    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    <label for="pwd">Password</label>
  </div>

  <div class="form-floating mt-3 mb-3">
    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd2">
    <label for="pwd">Password</label>
  </div>
  <button type="submit" class="btn btn-primary">Primary</button>
</form>


<?php
include 'footer.php';
?>