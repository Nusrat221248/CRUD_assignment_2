<?php
include('header.php');
include('config/db.php');

// Fetch Users
$stmt = $conn->prepare("SELECT id, name, email, description, experience, project, image_name, image_url FROM users WHERE 1");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <div class="card col-md-10 mx-auto mt-4">
        <div class="card-header">
            <h3 class="text-center text-secondary">All Users</h3>
        </div>
        <div class="card-body">
          
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>SL</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead> 

                <tbody>
                <?php foreach($users as $key => $user){ ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td>
                            <img src="<?= $user['image_url'] ?>" alt="profile" height="50px" width="50px" class="rounded-circle border">
                        </td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                    
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php
                 }?>
                </tbody>
            </table>
        </div>
    </div>
</div>