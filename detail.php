<?php
include "connect.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('No staff ID provided'); window.location.href='index.php';</script>";
    exit;
}


$staff = null;
$sql = "SELECT * FROM `staff` WHERE `id` = ? AND `is_active` = 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $staff = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Staff member not found'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Staff Details</title>
    <style>
        .staff-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .staff-avatar img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 80px;
        }
        .staff-info h2 {
            margin: 0;
            font-size: 24px;
            color: #1a3c66;
        }
        .staff-info small {
            color: #6c757d;
        }
        .staff-details p {
            margin: 5px 0;
            color: #1a3c66;
        }
        .staff-details i {
            margin-right: 10px;
            color: #6c757d;
        }
        .staff-actions a {
            margin-left: 10px;
            cursor: pointer;
            font-size: 18px;
        }
        .staff-actions .fa-pen {
            color: #f4a261;
        }
        .staff-actions .fa-times {
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Staff Details
    </nav>
    <div class="container">
        <div class="staff-card">
            <div class="d-flex justify-content-between align-items-start">
                <div class="staff-avatar">
                    <img src="<?php echo !empty($staff['avatar_url']) ? htmlspecialchars($staff['avatar_url']) : 'https://via.placeholder.com/100'; ?>" alt="Staff Avatar">
                </div>
                <div class="staff-info flex-grow-1">
                    <h2><?php echo htmlspecialchars($staff['full_name']); ?></h2>
                    <small><?php echo htmlspecialchars($staff['position']); ?></small>
                    <div class="staff-details mt-3">
                        <p><i class="fas fa-briefcase"></i><?php echo htmlspecialchars($staff['department']); ?></p>
                        <p><i class="fas fa-envelope"></i><a href="mailto:<?php echo htmlspecialchars($staff['email']); ?>"><?php echo htmlspecialchars($staff['email']); ?></a></p>
                        <p><i class="fas fa-phone"></i><?php echo htmlspecialchars($staff['phone'] ?? 'N/A'); ?></p>
                        <p><i class="fas fa-calendar"></i>Hired on <?php echo date('F d, Y', strtotime($staff['hire_date'])); ?></p>
                    </div>
                </div>
                <div class="staff-actions">
                    <a href="edit.php?id=<?php echo $staff['id']; ?>" class="text-decoration-none"><i class="fas fa-pen"></i></a>
                    <a href="index.php?id=<?php echo $staff['id']; ?>" class="text-decoration-none"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>