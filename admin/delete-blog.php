<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$id = (int)$_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM blogs WHERE id='$id'"
);

$blog = mysqli_fetch_assoc($result);

if($blog){

    // Delete Image

    $imagePath = "../" . $blog['image'];

    if(file_exists($imagePath)){
        unlink($imagePath);
    }

    // Delete Database Record

    mysqli_query(
        $conn,
        "DELETE FROM blogs WHERE id='$id'"
    );
}

header("Location: manage-blogs.php");
exit();

?>