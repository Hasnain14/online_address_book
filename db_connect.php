<?php
	
	$user = "root";
	$pass = "";
	$db = "address_book";

	$con_db =  mysqli_connect('localhost', $user, $pass, $db);

	if(!$con_db){
		echo "error";
	}
	
 ?>