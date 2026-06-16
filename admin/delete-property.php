<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    // Image Path Get
    $query = mysqli_query(
        $conn,
        "SELECT image FROM properties WHERE id='$id'"
    );

    $property = mysqli_fetch_assoc($query);

    if($property){

        // Delete Image
        $imagePath = "../" . $property['image'];

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        // Delete Record
        mysqli_query(
            $conn,
            "DELETE FROM properties WHERE id='$id'"
        );
    }
}

header("Location: manage-properties.php");
exit();

?>  