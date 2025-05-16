<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $avatar_url = mysqli_real_escape_string($conn, $_POST['avatar_url']);

    $sql = "INSERT INTO `staff` (`full_name`, `position`, `department`, `email`, `phone`, `hire_date`, `avatar_url`, `is_active`, `created_at`, `updated_at`) 
            VALUES ('$full_name', '$position', '$department', '$email', '$phone', '2025-05-14', '$avatar_url', 1, NOW(), NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New staff member added successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Add Staff Member</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Add Staff Member
    </nav>
    <div class="container">
        <div class="text-center mb-3">
            <h2>Add New Staff Member</h2>
        </div>
        <!-- <a href="index.php" class="btn btn-outline-success ">Staff Table</a> -->
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
                <div class="row mb-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" name="position" placeholder="Position" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-control" name="department" required>
                            <option value="">Select Department</option>
                            <option value="HR">HR</option>
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="hire_date" class="form-label">Hire Date</label>
                        <input type="date" class="form-control" name="hire_date" value="2025-05-14" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="avatar_url" class="form-label">Avatar URL (optional)</label>
                        <input type="text" class="form-control" name="avatar_url" placeholder="https://example.com/avatar.jpg">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="submit">Add Staff</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>