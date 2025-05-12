<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "studentdb";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check if the connection is successful
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error()); // Display the exact error
// } else {
//     echo "You are connected!";
// }
?>
               