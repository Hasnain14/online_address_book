<?php 

	require_once"db_connect.php";

	$my_id = $_GET['id'];
	//echo $my_id;

	$sql_delete = "DELETE FROM contact WHERE ID = $my_id";

	if(mysqli_query($con_db,$sql_delete)){
		echo '<script language="javascript">';
			echo 'alert("Delete successfully ")';
			echo '</script>';

			$url = 'result_show.php';
		header('location:'.$url);
				//exit();
	}

 ?>