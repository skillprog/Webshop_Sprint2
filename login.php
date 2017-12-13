<?php

session_start();

include 'connect.php';

if(isset($_POST['email']) and isset($_POST['pass'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * from users WHERE email='$email' and pass='$pass'";

    $result = mysqli_query($db, $query);
    $value = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['email'] = $email;
    } else {

    }
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
            <?php if(isset($_SESSION['email'])){
                echo "Welcome " . $value['firstname'];
            } else { ?>
                <form action = "" method = "post">
                    <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
                    <label>Pass  :</label><input type = "password" name = "pass" class = "box" /><br/><br />
                    <input type = "submit" value = " Logga in "/> <br />
                </form>
                <br>
                <a href="reg.php"><input type="submit" name="execute" id="execute" value="Registrera"></a>
            <?php }?>

        </div>



    </div> <!-- end content -->

</div> <!-- end wrapper -->

<?php include 'foot_test.php' ?>


</body>

</html>