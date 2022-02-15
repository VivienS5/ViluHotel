<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>chambre hôtel</title>
    </head>
    <body>
    <?php
    include 'header.php';
    ?>

    <?php
    include "connexion.php";
      if(isset($_POST["nom"])){
          $valide= !empty($_POST["nom"]) &&
                   !empty($_POST["prenom"]) &&
                   !empty($_POST["numerotel"]) &&
                   !empty($_POST["numerocarte"]) &&
                   !empty($_POST["cvv"]) &&
                   !empty($_POST["expiration"]);
        if(!$valide){
            echo "<div class='container mx-auto obl'>";
            echo "<p>Tous les champs sont obligatoire!</p>";
            echo "</div>";
        }else{
          try {
              $_GET["numero"];
              $sql = "INSERT INTO reservation(numero, nom, prenom, numerotel, numerocarte, cvv, expiration, client_id) VALUES (:numero, :nom, :prenom, :numerotel, :numerocarte, :cvv, :expiration, :id)";
              $stmt = $dbh->prepare($sql);
              $result= $stmt->execute($_POST);
          } catch (PDOException $e) {
              print "Erreur !: " . $e->getMessage() . "<br/>";
              die();
          }
          
          
                
        
      

      
          header('Location: ./mesreserv.php');
        }
  }    
    ?>

    <form class="ptt" method="POST">
        <input type="hidden" name="numero" value="<?php echo $_GET["numero"]?>"/>                  
        <input type="hidden" name="id" value="<?php echo $_SESSION["user"]["id"]?>"/>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nom:</label>
            <input type="text" class="form-control" name="nom" placeholder="Nom">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Prénom:</label>
            <input type="text" class="form-control" name="prenom" placeholder="Prénom">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Numéro de téléphone:</label>
          <input type="number" class="form-control"  name="numerotel" placeholder="01 23 45 67 89">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Numéro de la carte:</label>
          <input type="number" class="form-control"  name="numerocarte" placeholder="1234 5678 9009 0000">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Numéro de sécurité:</label>
            <input type="number" class="form-control" name="cvv" placeholder="123">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Date d'expiration:</label>
            <input type="date" class="form-control" name="expiration" placeholder="01/23">
          </div>
          <div class="form-group col-md-2">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
      </form>

      <?php
        include 'footerp.php';
        ?>
    
    </body>
</html>