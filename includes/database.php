<?php

$conn = mysqli_connect(
    "localhost:8889",
    "root",
    "root",
    "dream_world"
);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>