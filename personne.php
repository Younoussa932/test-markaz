<?php
      $bdd=new PDO('mysql:host=localhost;dbname=test_repertoire','root','');
      if (isset($_POST['nom'])and isset($_POST['prenom'])and isset($_POST['sexe'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $sexe=$_POST['sexe'];
        $created_by= 1;
        $created_at= date('Y-m-d H:i:s');
        $is_deleted= false;
        $insertpersonne = $bdd->prepare("INSERT INTO personne (nom, prenom, sexe, created_by, created_at, is_deleted) VALUES(?,?,?,?,?,?)");
        $insertpersonne->execute(array($nom, $prenom, $sexe, $created_by, $created_at, $is_deleted));
        header('Location:index.php');
      }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>text_markaz</title>
</head>
<body>
<h1 class="title">Mon Super Repertoire</h1>

<?php
include("menu.php");
?>

<div class="container">
    <form action="" method="POST">
        <div class="row m-5">
            <div class="col-md-4">
                <label for="nom">Nom:</label>
                <input type="text" id="" name="nom" placeholder="Votre Nom" required="required" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="prenom">Prenom:</label>
                <input type="text" id="" name="prenom" placeholder="Votre Prénom" required="required" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="sexe">Sexe:</label>
                <select name="sexe" id="sexe" class="form-control">
                    <option value="0"> Selectionner un èlèment</option>
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                </select>
            </div>
        </div>
        <div class="row col-md-2">
            <input class="btn btn-primary" type="submit" value="Submit">
            <input class="btn btn-primary" type="reset" value="Reset">
        </div>
    </form>
</div>

<script src="jquery/jquery3.5.1.js"></script>  
</body>
</html>