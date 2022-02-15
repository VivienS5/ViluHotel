<?php session_start();
            if(!isset($_SESSION["user"])){
                
            }else if(isset($_GET["deconnexion"])){
                
                unset($_SESSION['user']);
                header('Location: ./index.php'); 
            }
            ?>