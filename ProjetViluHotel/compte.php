<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Compte</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
    <div class="d-flex justify-content-center">
            <a href="./index.php"><img src="./logo.png" alt="LOGO" ></a>
         </div>
        
         

             <?php 
             
             session_start();
            if(!isset($_SESSION["user"])){
                
            }else if(isset($_GET["deconnexion"])){
                
                unset($_SESSION['user']);
                header('Location: ./index.php'); 
            }
        
            
            if(isset($_SESSION["user"])){
                
                
            }
?>
            
            
            
            <div class="container d-flex justify-content-center">
            <div class="main-body d-flex justify-content-center">
            </div>
            <div class="col-md-8 justify-content-center">
            
              <div class="card mb-3 ool">
                  <div class="oolo">
                    <h1>Mon espace</h1>
                    </div>
                    <hr>
                <div class="card-body">
                    
                  <div class="row">
                      
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["nom"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prenom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["prenom"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">adresse</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["adresse"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Code Postale</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["cp"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ville</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["ville"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                    echo $_SESSION["user"]["email"];
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="rowd-flex justify-content-center">
                    <div class="col-sm-12 d-flex justify-content-center">
                      <a class="btn btn-info d-flex justify-content-center" href="./mesreserv.php">Mes reservations</a>
                      <p>&nbsp&nbsp&nbsp&nbsp&nbsp</p>
                      <a class="btn btn-info d-flex justify-content-center" target="__blank" href="?deconnexion=1">Se deconnecter</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
 



            

            


           
        </div>
        <?php include("./footer.php") ?>
    </body>
</html>