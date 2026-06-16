<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$id = (int)$_GET['id'];

mysqli_query(
$conn,
"DELETE FROM team WHERE id='$id'"
);

header("Location: manage-team.php");
exit();