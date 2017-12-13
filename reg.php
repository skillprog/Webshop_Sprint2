<?php

session_start();

include 'connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// sql   structured query language
    $prep = $db->prepare("INSERT INTO users (usersID,email,pass,firstname,lastname) VALUES ('0',?,?,?,?)");
    //Now, you can bind some parameters.
    //  Character i=integer, d=double, s=string, b=blob

    $prep->bind_param('ssss',$email,$pass,$firstname,$lastname);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $prep->execute();
    $result = $db->insert_id ;
    $prep->close();


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head_test.php' ?>
</head>

<body>

<!-- start page-wrapper -->
<div class=wrapper>
    <?php include 'header_test.php' ?>

    <!-- navigation menu -->

    <!-- end navigation menu -->

    <?php include 'side_test.php' ?>

    <div id=content>
        <br>
        <p>maincontent here</p>
        <br>

        <div class="maincontrolbox">

            <form name="phpbasics" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" enctype="multipart/form-data">

                Förnamn:  <input name="firstname" id="firstname" type="text" size=25> <br><br>
                Efternamn:  <input name="lastname" id="lastname" type="text" size=25> <br><br>
                Email: <input name="email" id="email" type="text" size=25> <br><br>
                Pass: <input name="pass" id="pass" type="text" size=25> <br><br>

                <br><br>

                <input type="submit" name="execute" id="execute" value="Registrera"><br><br>

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

<?php include 'foot_test.php' ?>


</body>

</html>
