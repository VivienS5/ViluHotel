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


        



            
            <div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="./ch1.jpg"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6 ">
            <div class="jcc">
            <strong><h3>Mes reservations</h3></strong><br></div>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Reservé au nom de                                                 
                            </strong>
                        </td>
                        <td class="text-primary">
                        <?php echo $_SESSION["user"]["nom"]; ?>      
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                Date de reservation                                                   
                            </strong>
                        </td>
                        <td class="text-primary">
                            date
                        <!-- <?php echo $_SESSION["user"]["date"]; ?>   -->
                        </td>
                    </tr>
                    
                   

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                numéro de reservation(id)
                            </strong>
                        </td>
                        <td class="text-primary">

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

                        </td>
                    </tr>
                    
                    <tr>
                        <td >
                            <a class="btn btn-info d-flex justify-content-center" >Annulé la reservation</a>
                        </td>
                    </tr>
                    
                       
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        
           
        </div>
        <?php include("./footerp.php") ?>
    </body>
</html>