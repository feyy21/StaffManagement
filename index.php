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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP Crud</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        PHP Complete Crud Application
    </nav>
    <div class="container">
        <div class="text-center mb-3">
            <h2>User Table</h2>
        </div>
        
        <table class="table table-hover text-center table table-striped">
        
            <thead>
            
                <tr>
                    <a href="addNew.php" class="btn btn-outline-info">Add New User</a>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    $sql="SELECT * FROM `students`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            echo"
                                <th scope='row'>{$row['id']}</th>
                                <td>{$row['name']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['address']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}' class='link-dark'><i class='fa-solid fa-pen-to-square'></i></a>
                                    <a href='delete.php?id={$row['id']}' class='link-dark ms-2'><i class='fa-solid fa-trash'></i></a>
                                </td>
                            </tr>";

                        }
                    }
                    else{
                        echo "<tr><td colspan='7'>No data found</td></tr>";
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>