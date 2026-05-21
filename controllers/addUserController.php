<?php
    include('function.php');
    session_start();

    $btn = isset($_POST['submit']) ? $_POST['submit'] : null;

    if(isset($btn)){
        // Collect and sanitize data 
        $name        = test_user($_POST['name'] ?? '');
        $email       = test_user($_POST['email'] ?? ''); 
        $experience  = test_user($_POST['experience'] ?? '');
        $description = test_user($_POST['description'] ?? '');
        $project     = test_user($_POST['project'] ?? '');
        $profile_image = $_FILES['profile_image'] ?? null;

        // --- VALIDATION ---

        if (empty($name)) {
            $_SESSION['name_err'] = 'Name is required';
            header("location: ../index.php");
            exit; 
        }

        if (empty($email)) {
            $_SESSION['email_err'] = "Email is required";
            header("location: ../index.php");
            exit;
        }

        if (empty($description)) {
            $_SESSION['description_err'] = 'Description is required';
            header("location: ../index.php");
            exit;
        }

        // Image Check
        if (!$profile_image || empty($profile_image['name'])) {
            $_SESSION['image_err'] = 'Profile image is required';
            header("location: ../index.php");
            exit;
        } else {
            $image_name = $profile_image['name'];
            $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            
            
            echo " File extension is: " . $file_extension;

            $allowed = ['jpg','png','jpeg','webp'];
              if(!in_array($file_extension,$allowed)){
                $_SESSION['image_err'] = 'Invalid Image';
                header("location: ../index.php");
                exit();
}

   }
         

            // image
            
           $image_location = $profile_image['tmp_name'];
           $new_image_name = uniqid("user_").'.'.$file_extension; //user_01555.png
           $image_url = "http://localhost/CRUD_Assignment%202/uploads/".$new_image_name;




            // store in database

             include('../config/db.php');

             $stmt = $conn->prepare("INSERT INTO users(name, email, description, experience, project, image_name, image_url) VALUES (?,?,?,?,?,?,?)");
        
             $stmt->bind_param("sssssss", 
                $name, 
                $email, 
                $description, 
                $experience, 
                $project, 
                $new_image_name, 
                 $image_url
        );

           $insert = $stmt->execute();

        if($insert){
        
            move_uploaded_file($image_location, '../uploads/'.$new_image_name);
            
            $_SESSION['success'] = "Add user successfully";
            header("location: ../index.php");
            exit;
        }


    }
?>