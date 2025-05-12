<?php
include "connect.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('No student ID provided'); window.location.href='index.php';</script>";
    exit;
}

$sql = "DELETE FROM students WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Student deleted successfully'); window.location.href='index.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
