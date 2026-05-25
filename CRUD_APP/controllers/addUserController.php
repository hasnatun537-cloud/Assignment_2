<?php
include('../function.php');
session_start();

if(isset($_POST['submit'])){

    $name = test_user($_POST['name']);
    $email = test_user($_POST['email']);
    $description = test_user($_POST['description']);

    $experience = isset($_POST['experience']) 
    ? test_user($_POST['experience']) : '';

    $project = isset($_POST['project']) 
    ? test_user($_POST['project']) : '';

    $profile_image = $_FILES['profile_image'];

    // Name Validation
    if(empty($name)){
        $_SESSION['name_err'] = "Name is required";
        header("location: ../index.php");
        exit();
    }

    // Email Validation
    if(empty($email)){
        $_SESSION['email_err'] = "Email is required";
        header("location: ../index.php");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['email_err'] = "Invalid Email";
        header("location: ../index.php");
        exit();
    }

    // Description Validation
    if(empty($description)){
        $_SESSION['description_err'] = "Description is required";
        header("location: ../index.php");
        exit();
    }

    // Image Validation
    if(empty($profile_image['name'])){
        $_SESSION['image_err'] = "Profile image is required";
        header("location: ../index.php");
        exit();
    }

    $image_name = $profile_image['name'];

    $file_extension = strtolower(
        pathinfo($image_name, PATHINFO_EXTENSION)
    );

    $allowed = ['jpg','jpeg','png','webp'];

    if(!in_array($file_extension, $allowed)){
        $_SESSION['image_err'] = "Invalid image";
        header("location: ../index.php");
        exit();
    }

    // Image Upload
    $image_location = $profile_image['tmp_name'];

    $new_image_name = uniqid("user_").'.'.$file_extension;

    $image_url = "http://localhost/CRUD_APP/uploads/".$new_image_name;

    // Database
    include('../config/db.php');

    $stmt = $conn->prepare(
        "INSERT INTO users 
        (name, email, description, experience, project, image_name, image_url) 
        VALUES (?,?,?,?,?,?,?)"
    );

    $stmt->bind_param(
        "sssssss",
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

        move_uploaded_file(
            $image_location,
            '../uploads/'.$new_image_name
        );

        $_SESSION['success'] = "User added successfully";

        header("location: ../index.php");
        exit();
    }
}
?>