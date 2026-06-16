<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
/* Delete Message */

if(isset($_GET['delete'])){

    $id = (int)$_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM contact_messages WHERE id='$id'"
    );

    header("Location: manage-messages.php");
    exit();
}

/* Fetch Messages */

$result = mysqli_query(
    $conn,
    "SELECT * FROM contact_messages ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Messages</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f5f5f5;
    padding:30px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

h1{
    color:#d4a017;
}

.back-btn{
    background:#111827;
    color:white;
    padding:12px 18px;
    text-decoration:none;
    border-radius:8px;
}

.back-btn:hover{
    background:#d4a017;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
}

th{
    background:#111827;
    color:white;
    padding:15px;
    text-align:left;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.delete-btn{
    background:red;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
}

.delete-btn:hover{
    opacity:.8;
}

.no-data{
    text-align:center;
    padding:30px;
    color:#666;
}

</style>

</head>

<body>

<div class="header">

    <h1>📩 Contact Messages</h1>

    <a href="dashboard.php" class="back-btn">
        ← Back Dashboard
    </a>

</div>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo htmlspecialchars($row['name']); ?></td>

    <td><?php echo htmlspecialchars($row['phone']); ?></td>

    <td><?php echo htmlspecialchars($row['email']); ?></td>

    <td><?php echo htmlspecialchars($row['subject']); ?></td>

    <td><?php echo htmlspecialchars($row['message']); ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td>

        <a
        class="delete-btn"
        href="?delete=<?php echo $row['id']; ?>"
        onclick="return confirm('Delete this message?')">

        Delete

        </a>

    </td>

</tr>

<?php
}
}else{
?>

<tr>
    <td colspan="8" class="no-data">
        No Messages Found
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>