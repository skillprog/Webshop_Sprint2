<?php
/**
 * Created by PhpStorm.
 * User: beckas
 * Date: 2017-11-13
 * Time: 18:32
 */
    session_start();

    session_destroy();
    header('Location: login.php');
?>