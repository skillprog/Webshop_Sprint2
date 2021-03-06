<?php

include 'connect.php';
include 'functions/funcs.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datanördarna</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" >
  <!--  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/js/bootstrap.js"> -->
</head>

<body>

<!-- start page-wrapper -->
    <div class=wrapper>

    <!-- navigation menu -->
    <div class="header">
        
        <ul id="menu">
            <li><a href="#" class='active-page'>Hem</a></li>
            <li><a href="#">Produkter</a></li>
            <li><a href="customer/customer.php">Registrera dig</a></li>
            <li><a href="#">Logga in</a></li>
            <li><a href="cart.php">Kundvagn</a></li>
        </ul> 

    </div>
    <!-- end navigation menu -->

    <!-- <div id=sidemenu>
        <p>This will be sidemenu</p>
     </div> -->

    <div id=content>

        <?php cart(); ?>

        <div id="cartstyle">

            <span style=" font-size: 20px; padding: 5px;">

                <b style="color:white">Välkommen gästanvändare!</b>
                <a style="float: right; margin-right: 10px; color: yellow" href="cart.php">Din kundvagn</a>
                <b style="float:right; color:white; padding-right: 42px">Antal produkter: <?php totItems(); ?> </b>
                <b style="float:right; color:white; padding-right: 42px">Total kostnad: <?php totPrice(); ?> </b>

            </span>

        </div>

        <div id="productBox">

            <?php getProds();   ?>
        </div>



    </div> <!-- end content -->

</div> <!-- end wrapper -->

 <div id=footer>
    <p>footer</p>
 </div>


</body>

</html>