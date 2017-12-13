<?php

include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// sql   structured query language
    $prep = $db->prepare("INSERT INTO people (peopleid,firstname,lastname) VALUES ('0',?,?)");
    //Now, you can bind some parameters.
    //  Character i=integer, d=double, s=string, b=blob

    $prep->bind_param('ss',$firstname,$lastname);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $prep->execute();
    $result = $db->insert_id ;
    $prep->close();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datanördarna</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" >
</head>

<body>

<!-- start page-wrapper -->
    <div class=wrapper>

    <!-- navigation menu -->
    <div class="header">
        
        <ul id="menu">
            <li><a href="../index.php">Hem</a></li>
            <li><a href="#">Produkter</a></li>
            <li><a href="#" class='active-page'>Registrera dig</a></li>
            <li><a href="#">Logga in</a></li>
            <li><a href="#">Kundvagn</a></li>
        </ul> 

    </div>
    <!-- end navigation menu -->

     <div id=sidemenu>
        <p>This will be sidemenu</p>
     </div>

    <div id=content>
        
        <p>CUSTOMER SITE </p>


        <div class="maincontrolbox">

        <form name="phpbasics" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" enctype="multipart/form-data">

            Förnamn:  <input name="firstname" id="firstname" type="text" size=25> <br><br>
            Efternamn:  <input name="lastname" id="lastname" type="text" size=25> <br><br>
            
            <br><br>

            <input type="submit" name="execute" id="execute" value="Save Record in DB"><br><br>

        </form>
        <span>Resultat</span>
        <br>
        <div id="resultbox">

            <?php if (isset($_POST['execute'])){

                echo $result ;

            }  ?>

        </div>

        </div> 



    </div> <!-- end content -->

</div> <!-- end wrapper -->

 <div id=footer>
    <p>footer</p>
 </div>


</body>

</html>