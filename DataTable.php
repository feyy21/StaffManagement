<?php
include "connect.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="DataTable.css">
    <title>Staff Management</title>
    <style>
        
    </style>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Staff Management
    </nav>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Staff Directory</h4>
            <a href="addNew.php" class="btn btn-outline-primary">Add New Staff</a>
        </div>

        <?php   
        $sql = "SELECT * FROM `staff`";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $avatar_url = !empty($row['avatar_url']) ? $row['avatar_url'] : 'https://via.placeholder.com/40'; 
                echo "
                <div class='staff-card'>
                    <div class='staff-info'>
                        <img src='$avatar_url' alt='Avatar'>
                        <div>
                            <strong>" . htmlspecialchars($row['full_name']) . "</strong><br>
                            <small>" . htmlspecialchars($row['position']) . "</small>
                        </div>
                    </div>
                    <div class='staff-actions'>
                        <a href='detail.php?id={$row['id']}' class='text-primary'><i class='fa-solid fa-eye'></i></a>
                        <a href='edit.php?id={$row['id']}' class='text-warning ms-2'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a href='delete.php?id={$row['id']}' class='text-danger ms-2'><i class='fa-solid fa-trash'></i></a>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No staff members found.</p>";
        }
        ?>
    </div>
</body>
</html>