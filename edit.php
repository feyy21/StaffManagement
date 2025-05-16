<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $hire_date = mysqli_real_escape_string($conn, $_POST['hire_date']);
    $avatar_url = mysqli_real_escape_string($conn, $_POST['avatar_url']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "UPDATE `staff` SET 
            `full_name` = '$full_name', 
            `position` = '$position', 
            `department` = '$department', 
            `email` = '$email', 
            `phone` = '$phone', 
            `hire_date` = '$hire_date', 
            `avatar_url` = '$avatar_url', 
            `updated_at` = NOW() 
            WHERE `id` = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Staff member updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


$staff = null;
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM `staff` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $staff = mysqli_fetch_assoc($result);
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
    <title>Edit Staff Member</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        Edit Staff Member
    </nav>
    <div class="container">
        <div class="text-center mb-3">
            <h2>Edit Staff Member</h2>
        </div>
        <a href="index.php" class="btn btn-outline-success">Staff Table</a>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
                <input type="hidden" name="id" value="<?php echo isset($staff) ? $staff['id'] : ''; ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?php echo isset($staff) ? htmlspecialchars($staff['full_name']) : ''; ?>" placeholder="Full Name" required>
                    </div>
                    <div class="col">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" name="position" value="<?php echo isset($staff) ? htmlspecialchars($staff['position']) : ''; ?>" placeholder="Position" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-control" name="department" required>
                            <option value="">Select Department</option>
                            <option value="HR" <?php echo isset($staff) && $staff['department'] == 'HR' ? 'selected' : ''; ?>>HR</option>
                            <option value="IT" <?php echo isset($staff) && $staff['department'] == 'IT' ? 'selected' : ''; ?>>IT</option>
                            <option value="Finance" <?php echo isset($staff) && $staff['department'] == 'Finance' ? 'selected' : ''; ?>>Finance</option>
                            <option value="Marketing" <?php echo isset($staff) && $staff['department'] == 'Marketing' ? 'selected' : ''; ?>>Marketing</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($staff) ? htmlspecialchars($staff['email']) : ''; ?>" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo isset($staff) ? htmlspecialchars($staff['phone']) : ''; ?>" placeholder="Phone">
                    </div>
                    <div class="col">
                        <label for="hire_date" class="form-label">Hire Date</label>
                        <input type="date" class="form-control" name="hire_date" value="<?php echo isset($staff) ? htmlspecialchars($staff['hire_date']) : date('Y-m-d'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="avatar_url" class="form-label">Avatar URL (optional)</label>
                        <input type="text" class="form-control" name="avatar_url" value="<?php echo isset($staff) ? htmlspecialchars($staff['avatar_url']) : ''; ?>" placeholder="https://example.com/avatar.jpg">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="submit">Update Staff</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>