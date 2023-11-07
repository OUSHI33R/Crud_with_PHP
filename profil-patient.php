
 <?php
 // connexion au serveur 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "utilisateur";
 
 
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
   die("Problème durant la connexion entre le site et la base de données " . $conn->connect_error);
 }
 
 
  
   $selected = $_GET['id'];
  
   $sql = "SELECT id, fname, cin, age FROM utilisateur WHERE id='$selected'";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
     
     $fname =  $row["fname"];
     $cin =  $row["cin"];
     $age=  $row["age"];
   
   } 
   if ($result->num_rows > 0) {} else {
     die();
   
    ;}
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Profil Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="container">
  <form method="post">
    <br/>
    <h2>Profile du users </h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="fname"  class="form-control" placeholder="" value="<?php echo $fname ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>CIN</label>
          <input type="text" name="cin" class="form-control" value="<?php echo $cin ?>">
        </div>
      </div>
    
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>AGE</label>
          <input type="text" name="age" data-provide="datepicker" class="form-control" id='datetimepicker1' value="<?php echo $age ?>">
        </div>


      </div>    
    </div>    
    </div>
    

    <center>


    <button type="submit" name="modifier" class="btn btn-primary" >Modifier</button>
    <button type="submit" name="supprimer" class="btn btn-danger" >Supprimer ce user</button>
    <a class="btn btn-success" href="liste-patients.php" role="button">Retour</a>
   
    
</center>
  </form>
</div>
<center>
  <br/>
  <br/>
 <?php

    if(array_key_exists('modifier', $_POST)) {
      $fname = $_POST['fname'];
      $firstname = $_POST['cin'];
      $age = $_POST['age'];

     
      $sql = "UPDATE utilisateur SET fname='$fname',cin='$cin',age='$age'  WHERE id='$selected'";

      if ($conn->query($sql) === TRUE) {
        echo '<b style="color:green;">Le profil du patient est modifiée avec succès!</b>';
      } else {
        echo '<b style="color:red;">Erreur !</b>';
      }
  }
  if(array_key_exists('supprimer', $_POST)) {
    $sql = "DELETE FROM utilisateur WHERE id = $selected";
    $conn->query($sql);
    header('Location: liste-patients.php');

}

?>
</center>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
