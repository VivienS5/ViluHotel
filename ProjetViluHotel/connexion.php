<?php
        try {
            $user = "root";
            $pass = "";
            $dbh = new PDO('mysql:host=localhost;dbname=projetHotel', $user, $pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

 ?>
