<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<script>
		function delete_contact_confirm(delete_contact) {
			if(confirm("Confirm Delete ")){
				document.location = delete_contact;
			}
		}
	</script>
</head>
<body class="index_body">
	<div class="view_contact">
		

	<?php 

		session_start();

		require_once"db_connect.php";

		if(!isset($_SESSION['user_id'])){
			echo "error";
			//exit();
		}

		$id = $_SESSION['user_id'];

		$url_add = "add_data.php ? user_id= ".$id;
		

		echo "<a  href='$url_add'><input class='add_contact_button' type='button' value='Add Contact'></a>"	;

 	?>
  
		<div style="clear: both;"></div>
		<br>

		<form action="search_contact.php" method="POST">
			
			<input class="search_box" type="text" name="search_contact" placeholder="search">
			
		</form>

		<form  action="download.php" method="post">
            <button id="csv_btn"  value="Download" type="submit" name="download_csv" class="btn-success";" >Download</button>
        </form>

		
		<div style="clear: both;"></div>
		<br>
		<table cellpadding="5" border="1" id="contactsTable" class="display">
					<thead>
						<tr align="left">
							<th>Name</th>
							<th>Nickname</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Website</th>
							<th>Birth Day</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$sql_show = "SELECT * from contact WHERE user_id = '$id'";

						$result_show = mysqli_query($con_db,$sql_show);

						while ($data = mysqli_fetch_assoc($result_show)):

						 ?>

						 <tr>
						 	<td><?php echo $data['FullName'];?></td>
							<td><?php echo $data['NickName'];?></td>
							<td><?php echo $data['PhoneNumber'];?></td>
							<td><?php echo $data['Address'];?></td>
							<td><?php echo $data['Website'];?></td>
							<td><?php echo $data['BirthDay'];?></td>
							<td>
							<a  href="edit_contact.php ? id=<?php echo $data['ID']; ?>"><input class="e_d" type="button" value="Edit"></a>
								<a  href="javascript:delete_contact_confirm('delete_contact.php ? id=<?php echo $data['ID']; ?>') "><input class="e_d" type="button" value="Delete"></a>
							</td>
						 </tr>

					 	<?php endwhile; ?>

					</tbody>
				</table>
			
				<br>
				<br>
				<a  href="logput.php"><input class="logout_button" type="button" value="Log Out"></a>	
	</div>

</body>


</html>


