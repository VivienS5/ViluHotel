<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="formu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>connect hôtel</title>
    </head>

    <body ><!--background="hot2.jpg"-->
        <div class="d-flex justify-content-center">
            <a href="./index.php"><img src="./logo.png" alt="LOGO" ></a>
         </div>


         
            <?php 
            session_start();
            require_once("connexion.php"); 
            if(isset($_POST["email"])){
                $valide= !empty($_POST["email"]) &&
                         !empty($_POST["password"]);
                if(!$valide){
                    echo "<div class='container mx-auto obl'>";
                    echo "<p>Tous les champs sont obligatoire!</p>";
                    echo "</div>";
                }else{
                    $sql = "SELECT * FROM client WHERE email='".$_POST['email']."'";
                    $stmt = $dbh->query($sql, PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $result= $stmt->fetch();
                    if(isset($result['password']) && password_verify($_POST["password"], $result['password'])){
                        unset($result['password']);
                        $_SESSION["user"]= $result;
                        header('Location: ./compte.php');  
                    }else{
                        echo "<div class='erri d-flex justify-content-center'>";
                        echo "Identifiants incorrect !";
                        echo "</div>";
                    }
                }
            }else if(isset($_SESSION["user"])){
                header('Location: ./compte.php'); 
            }
    ?>
   
   <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
                <div class="form-data" v-if="!submitted">
                <form method="POST" action="#">
                    <div class="forms-inputs mb-4"> <span>Email</span> <input type="email" name="email" >
                    </div>
                    <div class="forms-inputs mb-4"> <span>Mot de passe</span> <input type="password" name="password" >
                    </div>
                <div class="success-data" v-else>
                    <div class="text-center d-flex flex-column"> <button type="submit" class="btn btn-primary ">Valider</button> </div>
                    </form>
                    <div class="row d-flex justify-content-center">
                        <span><h5>Pas encore inscrit ? </h5>
                        <a href="./inscrip.php"><h5>S'inscrire</h5></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
</div>
    
    <?php
    include 'footerp.php';
    ?>
    </body>
    
</html>


