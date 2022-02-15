<meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <div class="d-flex justify-content-center">
            <a href="./index.php"><img src="./logo.png" alt="LOGO" ></a></div>
        <a href="connect.php"><button type="submit" class="drt">Se connecter</button> </a>

        <?php
    include 'sess.php';
    if(isset($_SESSION['user'])){
        echo "<a href='connect.php'><button type='submit' class='drt'>Mon compte</button> </a>";

    }

    ?>
