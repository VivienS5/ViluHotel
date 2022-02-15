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



<div class="car">
    <?php
    include "connexion.php";
    if(isset($_GET["numero"])){
        $results = $dbh->query('SELECT * from chambre where numero='.$_GET['numero']);
        foreach($results as $row){
            echo "<div class='tyt'>";
            echo "<img src='data:image/jpg;base64,".base64_encode($row["photo"])."' alt='photo1'>";
            echo "<span>".$row["description"]."</span>";
            echo "</div>";   
        }
    }
    ?>
</div>

<div class="Prix"><!--navbarre-->
            <ul>
                <li>Date d'arrivée ?&nbsp&nbsp<!--calendrier-->
                <input type="date" value="2021-12-10"
                min="2021-01-01" max="2022-12-31"></li><br/>
                <li>Date de départ ?<!--calendrier-->
                <input type="date" value="2021-12-11"
                min="2021-01-01" max="2022-12-31"></li>
              
                
    <div class="info-prix">
        <?php
        include "connexion.php";
        if(isset($_GET["numero"])){
            $results = $dbh->query('SELECT * from chambre where numero='.$_GET['numero']);
            
        }

        echo "<span>Prix:<b id='rectangle'>$row[prix]€</b></span>";
        ?>

     
<?php
    
    if(isset($_SESSION['user'])){
        echo "<a href='./validation.php?numero=".$row['numero']."'><button type='submit'>Réserver</button> </a>";
        
    }else{
        echo "<a href='./connect.php'><button type='button'>Connectez vous!</button></a>";
    }

    ?>
</div> 
</ul>
</div>

        <?php
        include 'footer.php';
        ?>

    </body>
</html>