<?php
/**
 * Created by PhpStorm.
 * User: antonkarmeborg
 * Date: 2017-11-13
 * Time: 22:11
 */

$dbcon = new mysqli("localhost", "Admin", "admin", "webshopdb");



function getProds(){


    global $dbcon;

    $getProds = "select * from products";

    $run_getProds = mysqli_query($dbcon, $getProds);


    while ($row_Prods=mysqli_fetch_array($run_getProds)){

        $prods_id = $row_Prods['productID'];
        $prods_title = $row_Prods['productTitle'];
        $prods_price = $row_Prods['productPrice'];
        $prods_desc = $row_Prods['productDesc'];
        $prods_img = $row_Prods['productImg'];

        echo "
        
            <div id='singleproduct'>
                <h2>$prods_title</h2>
                <img src='admin/prod_img/$prods_img' width='200' height='200' />
                <p><b>$prods_price</b>kr</p>
                <br>
                <a href='details.php?prods_id=$prods_id'><button style='float: left;'>Info</button></a>            
             
                <a href='index.php?cartADD=$prods_id'><button style='float: right;'>Lägg i kundvagn</button></a>    
                  
                  
                        
            </div>
       
        ";

    }

}

function getDetailProds()
{

    global $dbcon;

    if (isset($_GET['prods_id'])) {


        $productID = $_GET['prods_id'];

        $getProds = "select * from products WHERE productID='$productID'";

        $run_getProds = mysqli_query($dbcon, $getProds);


        while ($row_Prods = mysqli_fetch_array($run_getProds)) {

            $prods_id = $row_Prods['productID'];
            $prods_title = $row_Prods['productTitle'];
            $prods_price = $row_Prods['productPrice'];
            $prods_desc = $row_Prods['productDesc'];
            $prods_img = $row_Prods['productImg'];

            echo "
        
                    <div id='singleproduct'>
                        <h2>$prods_title</h2>
                        <img src='admin/prod_img/$prods_img' width='400' height='300' />
                        <br><br>
                        <p><b>$prods_price</b>kr</p>
                        <br>
                        <p>$prods_desc</p>
                        <br>
                        <a href='index.php'><button style='float: left;'>Tillbaka</button></a>            
             
                        <a href='index.php?cartADD=$prods_id'><button style='float: right;'>Lägg i kundvagn</button></a>    
                                  
                                
                    </div>";

        }
    }

}

function cart(){

    if(isset($_GET['cartADD'])){

        global $dbcon;

        $ip = getIp();

        $prods_id = $_GET['cartADD'];

        $checkProd = "select * from cart WHERE prodID='$prods_id' AND prodADD='$ip'";

        $run_check = mysqli_query($dbcon, $checkProd);

        if(mysqli_num_rows($run_check) > 0){

            echo "";

        }else{

            $insertProd = "insert into cart (prodID,prodADD) VALUES ('$prods_id','$ip')";

            $runProds = mysqli_query($dbcon, $insertProd);

            echo "<script>window.open('index.php','_self')</script>";

        }

    }

}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}


function totItems(){

    if (isset($_GET['cartADD'])){

        global $dbcon;

        $ip = getIp();

        $getItems = "select * from cart WHERE prodADD='$ip'";

        $runItems = mysqli_query($dbcon, $getItems);

        $countItems = mysqli_num_rows($runItems);

    }

    else{

        global $dbcon;

        $ip = getIp();

        $getItems = "select * from cart WHERE prodADD='$ip'";

        $runItems = mysqli_query($dbcon, $getItems);

        $countItems = mysqli_num_rows($runItems);

        }
    echo $countItems;

}

function totPrice(){

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

                $fetchedValues = array_sum($productPrice);

                $total += $fetchedValues;
        }


    }

    echo $total . "kr";

}

?>

