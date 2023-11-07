<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Ajouter un patient</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<div class="container">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <br/>
    <h2>Liste Users</h2>
    <br/>
    <a style="float:right;" class="btn btn-primary" href="ajout-patient.php" role="button">+ Ajouter un user</a>
    <br/>
    <br/>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">CIN</th>
      <th scope="col">Age</th>
      <th scope="col"></th>
      <th scope="col"></th>


    </tr>
  </thead>
  <tbody>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateur";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Erreur : " . $conn->connect_error);
}

$sql = "SELECT id, fname, cin, age FROM utilisateur";
$result = $conn->query($sql);


$conn->close();
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo '
   <tr>
   <th scope="row">'. $row["id"].'</th>
   <td>'. $row["fname"].'</td>
   <td>'. $row["cin"].'</td>
   <td>'. $row["age"].'</td>
   <td> <center><a class="btn btn-success" href="profil-patient.php?id='. $row["id"].'" role="button">Modifier</a></center></td>
   <td><center><a class="btn btn-danger" href="profil-patient.php?id='. $row["id"].'" role="button">Supprimer</a></center></td>
 </tr>
   
   
   ';
  }
}  
?>

   
   
   
  </tbody>
</table>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
