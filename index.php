<?php
   session_start();
    include "header.php";
?>

<div class="container">
    <div class="card col-md-6 mx-auto mt-3">
        <div class="card-header">
            <h3 class="text-center text-secondary">Add User</h3>
        </div>
        <div class="card-body">
            <form action="./controllers/addUserController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" />

                    <?php
                      if(isset($_SESSION['error'])){?>
                        <span class="text-danger"> <?=$_SESSION['error'] ?> </span>

                <?php   }
                ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" />

                    <?php
                      if(isset($_SESSION['error'])){?>
                        <span class="text-danger"> <?=$_SESSION['error'] ?> </span>

                <?php   }
                ?>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" />
                    <?php
                      if(isset($_SESSION['error'])){?>
                        <span class="text-danger"> <?=$_SESSION['error'] ?> </span>

                <?php   }
                ?>
                </div>



                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea name="Description" id="Description" class="form-control summernote"></textarea>
</div>
                    <div class="mb-3">
                    <label for="Experience" class="form-label">Experience</label>
                    <textarea name="Experience" id="Experience" class="form-control summernote"></textarea>
</div>

                  <div class="mb-3">
                    <label for="Project" class="form-label">Project</label>
                    <textarea name="Project" id="Project" class="form-control summernote"></textarea>
</div>
                  <div class="mb-3">
                    <label for="profile" class="form-label">profile</label>
                     <input type="file" name="profile_img" id="profile" class="form-control">
</div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 100
        });
    });
  </script>