<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Gestion Des Utilisateurs</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="container">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <br/>
    <h2>Gestion Des Utilisateurs</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="fname" name="firstname" class="form-control" placeholder="" id="first">
        </div>
      </div>
    

      <div class="col-md-6">
        <div class="form-group">
          <label>CIN</label>
          <input type="text" name="cin" class="form-control" placeholder="" id="last">
        </div>
      </div>
    
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Age</label>
          <input type="text" name="age" data-provide="datepicker" class="form-control" id='datetimepicker1'>
        </div>


      </div>
    </div>    
    </div>
    
    <center>


    <button type="submit" class="btn btn-success" >Ajouter un user</button>
    <a class="btn btn-primary" href="liste-patients.php" role="button">Liste des users</a>
</center>
  </form>
</div>
<center>
  <br/>
  <br/>
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $cin = $_POST['cin'];
  $age = $_POST['age'];
  
$sql = "INSERT INTO utilisateur (fname, cin , age) VALUES ('$fname', '$cin', '$age' )";


  if (empty($fname) || empty($cin) || empty($age)  ) {
    echo '<b style="color:red;"> Informations manquantes!</b> ';
  } else {
    if ($conn->query($sql) === TRUE) {
      echo '<b style="color:green;"> User est ajoutée avec succès!</b>';
      header('Location: liste-patients.php');
    } else {
      echo "Erreur :   " . $sql . "<br>" . $conn->error;
    }
    
  }
}  
?>
</center>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
