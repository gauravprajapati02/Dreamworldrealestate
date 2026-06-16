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
    "SELECT * FROM hero_slides WHERE id='$id'"
);

$slider = mysqli_fetch_assoc($result);

if($slider){

    // Delete Slider Image

    $imagePath = "../" . $slider['image'];

    if(file_exists($imagePath)){
        unlink($imagePath);
    }

    // Delete Database Record

    mysqli_query(
        $conn,
        "DELETE FROM hero_slides WHERE id='$id'"
    );
}

header("Location: manage-slider.php");
exit();

?>