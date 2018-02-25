<?php

session_start();

require_once"db_connect.php";


if (!isset($_SESSION['user_id'])) {
   echo "error" ;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM contact where user_id = '$user_id'";
$result = mysqli_query($con_db, $query); 

if(isset($_POST['download_csv'])) {

    $filename = "Information.csv";
    $fp = fopen('php://output', 'w');

    $header = array(
        'Full Name',
        'Nick Name',
        'Phone Number',
        'Address',
        'Website',
        'Birth Date',

    );

    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename='.$filename);
    fputcsv($fp, $header);

    $csv_query = "SELECT FullName,NickName,PhoneNumber,Address,Website,BirthDay FROM contact where user_id = '$user_id'";
    $csv_result = mysqli_query($con_db, $csv_query);

    while($row = mysqli_fetch_row($csv_result)) {
        fputcsv($fp, $row);
    }
}
?>