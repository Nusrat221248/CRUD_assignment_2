<?php
    include ('../function.php');

    session_start();
    //collecting data from user input form
    $btn = test_user($_POST['submit']);
      $name = test_user($_POST['name']);
     $email = test_user($_POST['email']);
     $phone = test_user($_POST['phone']);
      $experience = test_user($_POST['experience']);
      $description = test_user($_POST['description']);
        $project = test_user($_POST['project']);
         $profile_image = $_FILES['profile_image'];


    if(isset($btn)){
    if(empty($name) || empty($email) || empty($phone) || empty($experience) || empty($description) || empty($project) || empty($profile_image))
        {
        $_SESSION['error'] = 'required';

        header("location: ../index.php");
    }
            //name validation
         if (empty($name)) {
         $_SESSION['name_err'] = 'Name is required';
          header("location: ../index.php");

      } 
      elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
              $_SESSION['name_err'] = "Only letters and white space allowed";
}


//email validation
  
 if(empty($email)){
    $_SESSION['email_err'] = "Email is required";
    header("location: ../index.php");
}
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
}
}



?>