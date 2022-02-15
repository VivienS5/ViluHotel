<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Tête hôtel</title>
    </head>
    <body>
    <?php
    include 'header.php';
    ?>

<header >
<div class="fondtop d-flex justify-content-center"><!--navbarre-->
    <ul>
        <li>Date d'arrivée ?<!--calendrier-->
        <input type="date" value="2021-12-10"
        min="2021-01-01" max="2022-12-31"></li>
        <li>Date de départ ?<!--calendrier-->
        <input type="date" value="2021-12-11"
        min="2021-01-01" max="2022-12-31"></li>
        <li><button type="submit">Rechercher</button></li>
      </ul>
</div>
</header>

<div class="pres grid-container"><!--images, descriptions des chambres-->

<?php

include("./connexion.php");
$results = $dbh->query('SELECT * from chambre');


foreach($results as $row){
    echo "<div class='opp'>";
    echo "<a href='pagechambre.php?numero=".$row['numero']."'>";
    echo "<img src='data:image/jpg;base64,".base64_encode($row["photo"])."' alt='photo1'>";
    echo "<span>".$row["description"]."</span>";
    echo "</a>";
    echo "</div>";
}

?>
</div>

<?php
    include 'footer.php';
    ?>
    

    </body>
</html>