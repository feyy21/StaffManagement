<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    
    $delete_sql = "DELETE FROM staff WHERE id = '$id'";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: index.php?message=Staff deleted successfully");
        echo "<script>alert('Staff deleted successfully'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Error deleting staff: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
