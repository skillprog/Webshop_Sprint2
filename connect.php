<?php

$message = '';

$db = new mysqli('localhost', 'Admin', 'admin', 'webshopdb');


if($db->connect_error){
	
	$message = $db->connect_error;
}

echo $message;

?>