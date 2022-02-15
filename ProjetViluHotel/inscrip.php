<meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <body background="hot2.jpg"><!---->
        <div class="d-flex justify-content-center">
            <a href="./index.php"><img src="./logo.png" alt="LOGO" ></a>
         </div>

    <?php
    session_start();
    include "connexion.php";
         if(isset($_POST["nom"])){
                $valide= !empty($_POST["nom"]) &&
                         !empty($_POST["prenom"]) &&
                         !empty($_POST["adresse"]) &&
                         !empty($_POST["cp"]) &&
                         !empty($_POST["ville"]) &&
                         !empty($_POST["email"]) &&
                         !empty($_POST["password"]);

                if(!$valide){
                    echo "<div class='container mx-auto obli'>";
                    echo "<p>Tous les champs sont obligatoire!</p>";
                    echo "</div>";
                }else{
                    try {
                        $_POST['password']= password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $sql = "INSERT INTO client(nom, prenom, adresse, cp, ville, email, password) VALUES (:nom, :prenom, :adresse, :cp, :ville, :email, :password)";
                        $stmt = $dbh->prepare($sql);
                        $result= $stmt->execute($_POST);
                    } catch (PDOException $e) {
                        echo "<div class='err d-flex justify-content-center'>";
                        echo "L'addresse email est déjà utilisé.";
                        echo "</div>";
                        echo '<a href="inscrip.php"><button type="submit" class="errb">Inscription</button> </a>';
                        include 'footerp.php';
                        // print "Erreur !: " . $e->getMessage() . "<br/>";
                        die();
                    }
                    $sql = "SELECT * FROM client WHERE email='".$_POST['email']."'";
                    $stmt = $dbh->query($sql, PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $result= $stmt->fetch();
                    unset($result['password']);
                    $_SESSION["user"]= $result;
                    header('Location: ./compte.php');
                }
            }    
           
            
            
    ?>

<div >
    <form method="POST" action="#" class="ctrc colo">
        <span>Nom:</span>
        <input type="text" name="nom" /><br/>
        <span>Prénom:</span>
        <input type="text" name="prenom" /><br/>
        <span>Adresse:</span>
        <input type="text" name="adresse" /><br/>
        <span>Code Postal:</span>
        <input type="number" name="cp" /><br/>
        <span>Ville:</span>
        <input type="text" name="ville" /><br/>
        <span>Email:</span>
        <input type="email" name="email" /><br/>
        <span>password:</span>
        <input type="text" name="password" /><br/>
        <button type="submit" class="btn btn-primary wt">Valider</button>
    </form>
</div>

<?php
    include 'footer.php';
    ?>
