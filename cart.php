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
            <li><a href="index.php">Hem</a></li>
            <li><a href="#">Produkter</a></li>
            <li><a href="customer/customer.php">Registrera dig</a></li>
            <li><a href="#">Logga in</a></li>
            <li><a href="#" class='active-page'>Kundvagn</a></li>
        </ul> 

    </div>
    <!-- end navigation menu -->



    <div id=content>

     <?php //cart(); ?>

     <!--   <div id="cartstyle">

            <span style=" font-size: 20px; padding: 5px;">

                <b style="color:white">Välkommen gästanvändare!</b>
                <a style="float: right; margin-right: 10px; color: yellow" href="cart.php">Din kundvagn</a>
                <b style="float:right; color:white; padding-right: 42px">Antal produkter: <?php totItems(); ?> </b>
                <b style="float:right; color:white; padding-right: 42px">Total kostnad: <?php totPrice(); ?> </b>

            </span>

        </div> -->

        <div id="productBox">
            <br> <br>
            <form action="" method="post" enctype="multipart/form-data">

                <table align="center" width="90%">

                    <!--<tr align="center">
                        <td colspan="5"><h2>Hantera din kundvagn</h2></td>
                    </tr> -->

                    <tr align="center">
                        <th>Ta bort</th>
                        <th>Produkt</th>
                        <th>Antal</th>
                        <th>Kostnad</th>
                    </tr>

                    <?php

                    $total = 0;

                    global $dbcon;

                    $ip = getIp();

                    $getPrice = "select * from cart where prodADD='$ip'";

                    $runPrices = mysqli_query($dbcon, $getPrice);

                    while ($rowProds = mysqli_fetch_array($runPrices)){

                        $prodsID = $rowProds['prodID'];

                        $prodsPrice = "select * from products WHERE productID='$prodsID'";

                        $runProdsPrice = mysqli_query($dbcon,$prodsPrice);

                        while ($rowPrices = mysqli_fetch_array($runProdsPrice)){

                            $productPrice = array($rowPrices['productPrice']);

                            $productTitle = $rowPrices['productTitle'];
                            $productImage = $rowPrices['productImg'];
                            $oneProdPrice = $rowPrices['productPrice'];


                            $fetchedValues = array_sum($productPrice);

                            $total += $fetchedValues;


                    ?>


                    <tr align="center">

                        <td><input type="checkbox" name="remove[]" value="<?php echo $prodsID; ?>"/></td>
                        <td><?php echo $productTitle; ?><br><img src="admin/prod_img/<?php echo $productImage; ?>" width="120" height="120"/> </td>
                        <td><input type="text" size="7" name="qty"/> </td>


                        <?php

                        if (isset($_POST['updateCart'])){
                            $qty = $_POST['qty'];

                            $updateQty = "update cart set qty='$qty'";
                            $runQty = mysqli_query($dbcon,$updateQty);

                        }

                        ?>


                        <td><?php echo $oneProdPrice; ?> kr</td>
                    </tr>

                    <?php } } ?>

                    <tr align="right">
                        <td colspan="4"><b>Totalkostnad: </b></td>
                        <td colspan="4"><?php echo $total; ?> kr</td>
                    </tr>

                    <tr align="center">
                        <td><input type="submit" name="updateCart" value="Uppdatera kundvagn"/> </td>
                        <td><input type="submit" name="continue" value="Fortsätt handla"/></td>
                        <td><button><a href="checkout.php" style="text-decoration: none; color:black;">Köp</a></button></td>
                    </tr>

                </table>

            </form>

            <?php

            $ip = getIp();

            if(isset($_POST['updateCart'])){

                foreach($_POST['remove'] as $removeID) {

                $deleteProd = "delete from cart WHERE prodID='$removeID' AND prodADD='$ip'";

                $runDelete = mysqli_query($dbcon, $deleteProd);

                if($runDelete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }

                }
            }

            if(isset($_POST['continue'])){
                echo "<script>window.open('index.php','_self')</script>";
            }

            ?>


        </div> <!-- end productbox -->



    </div> <!-- end content -->

</div> <!-- end wrapper -->

 <div id=footer>
    <p>footer</p>
 </div>


</body>

</html>