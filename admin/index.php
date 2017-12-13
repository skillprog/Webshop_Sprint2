<?php
/**
 * Created by PhpStorm.
 * User: antonkarmeborg
 * Date: 2017-11-12
 * Time: 22:20
 * INDEX FOR ADMINSITE
 */



include("admindbcon.php");

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Datanördarna</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap/css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap/js/bootstrap.js">
    </head>

    <body>

    <!-- start page-wrapper -->
    <div class=wrapper>

        <!-- navigation menu -->
        <div class="header">

            <h2>Admin Site</h2>

        </div>

        <div id="subadminhead">

            <a href="index.php?adminInsert">Skapa produkt</a>

        </div>
        <!-- end navigation menu -->

        <div id=content>

            <?php

                if(isset($_GET['adminInsert'])){

                    include ("adminInsert.php");

                }

            ?>

        </div> <!-- end content -->

    </div> <!-- end wrapper -->

    <div id=footer>
        <p>footer</p>
    </div>


    </body>

    </html>