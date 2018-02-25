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

						require_once"db_connect.php";

						$search=$_POST['search_contact'];

						$sql="SELECT * FROM contact WHERE Address LIKE '%$search%'";

						$show = mysqli_query($con_db,$sql);

						$count=mysqli_num_rows($show);

						while ($data = mysqli_fetch_assoc($show)):

						 ?>

						 <tr>
						 	<td><?php echo $data['FullName'];?></td>
							<td><?php echo $data['NickName'];?></td>
							<td><?php echo $data['PhoneNumber'];?></td>
							<td><?php echo $data['Address'];?></td>
							<td><?php echo $data['Website'];?></td>
							<td><?php echo $data['BirthDay'];?></td>
							<td>
							<a  href="edit_contact.php ? id=<?php echo $data['ID']; ?>"><input class="e/d" type="button" value="Edit"></a>
								<a  href="javascript:delete_contact_confirm('delete_contact.php ? id=<?php echo $data['ID']; ?>') "><input class="e/d" type="button" value="Delete"></a>
							</td>
						 </tr>

					 	<?php endwhile; ?>

					</tbody>
				</table>

				<br>

				<a  href="logput.php"><input class="logout_button" type="button" value="Log Out"></a>	
	</div>

</body>


</html>