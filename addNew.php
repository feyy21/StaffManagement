<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "INSERT INTO `students` (`name`, `gender`, `phone`, `email`, `address`, `is_active`, `created_at`, `updated_at`) 
            VALUES ('$full_name', '$gender', '$phone_num', '$email', '$address', 1, NOW(), NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New student added successfully'); window.location.href='index.php';</script>";
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
    <title>PHP Crud</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        PHP Complete Crud Application
    </nav>
    <div class="container">
        <div class="text-center mb-3">
            <h2>Add new User</h2>
            <p>Complete the form below to add new user</p>
        </div>
        <a href="index.php" class="btn btn-outline-success">User Table</a>
        <div class=" container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="full name" required>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_num" placeholder="phone number" required>
                    </div>
                    <div class="col">
                    <label for="province" class="form-label">Address</label>
                    <select class="form-control" name="address" required>
                        <option value="">Select Province</option>
                        <option value="banteay_meanchey">Banteay Meanchey</option>
                        <option value="battambang">Battambang</option>
                        <option value="kampong_cham">Kampong Cham</option>
                        <option value="kampong_chhnang">Kampong Chhnang</option>
                        <option value="kampong_speu">Kampong Speu</option>
                        <option value="kampong_thom">Kampong Thom</option>
                        <option value="kampot">Kampot</option>
                        <option value="kandal">Kandal</option>
                        <option value="koh_kong">Koh Kong</option>
                        <option value="kratie">Kratie</option>
                        <option value="mondulkiri">Mondulkiri</option>
                        <option value="pursat">Pursat</option>
                        <option value="preah_vihear">Preah Vihear</option>
                        <option value="prey_veng">Prey Veng</option>
                        <option value="ratanakiri">Ratanakiri</option>
                        <option value="siem_reap">Siem Reap</option>
                        <option value="preah_sihanouk">Preah Sihanouk</option>
                        <option value="stung_treng">Stung Treng</option>
                        <option value="svay_rieng">Svay Rieng</option>
                        <option value="takeo">Takeo</option>
                        <option value="oddar_meanchey">Oddar Meanchey</option>
                        <option value="kep">Kep</option>
                        <option value="pailin">Pailin</option>
                        <option value="tboung_khmum">Tboung Khmum</option>
                        <option value="phnom_penh">Phnom Penh</option>
                    </select>
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="name@example.com" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label">Gender :</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                    <label for="male" class="form-input-label">Male</label>
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" required>
                    <label for="female" class="form-input-label">Female</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>