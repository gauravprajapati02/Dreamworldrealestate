<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$result = mysqli_query(
    $conn,
    "SELECT * FROM hero_slides ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Slider</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f5f7fb;
    font-family:Arial,sans-serif;
    padding:30px;
}

.page-title{
    font-size:28px;
    font-weight:700;
    margin-bottom:25px;
    color:#111827;
}

.table-card{
    background:#fff;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#111827;
    color:#fff;
    padding:15px;
    text-align:left;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.slider-img{
    width:120px;
    height:70px;
    object-fit:cover;
    border-radius:10px;
}

.status-active{
    background:#dcfce7;
    color:#15803d;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.status-inactive{
    background:#fee2e2;
    color:#dc2626;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.edit-btn{
    background:#d4a017;
    color:#fff;
    text-decoration:none;
    padding:8px 15px;
    border-radius:6px;
}

.delete-btn{
    background:#ef4444;
    color:#fff;
    text-decoration:none;
    padding:8px 15px;
    border-radius:6px;
}

</style>

</head>

<body>

<h2 class="page-title">
🎞 Manage Hero Slider
</h2>

<div class="table-card">

<table>

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Title</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img
src="../<?php echo $row['image']; ?>"
class="slider-img">
</td>

<td>
<?php echo $row['title']; ?>
</td>

<td>

<?php if($row['status']==1){ ?>

<span class="status-active">
Active
</span>

<?php } else { ?>

<span class="status-inactive">
Inactive
</span>

<?php } ?>

</td>
<td>

<a
href="edit-slider.php?id=<?php echo $row['id']; ?>"
class="edit-btn">
Edit
</a>

<a
href="delete-slider.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete Slider?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>