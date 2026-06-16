
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
"SELECT * FROM projects ORDER BY id DESC"
);

$totalProjects = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Projects</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
margin:0;
padding:30px;
background:#f5f5f5;
font-family:Arial,sans-serif;
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,.08);
margin-bottom:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,.08);
}

th{
background:#111827;
color:white;
padding:15px;
}

td{
padding:15px;
border-bottom:1px solid #eee;
}

.project-img{
width:90px;
height:70px;
object-fit:cover;
border-radius:6px;
}

.edit-btn{
background:#d4a017;
color:white;
padding:8px 12px;
text-decoration:none;
border-radius:5px;
}

.delete-btn{
background:red;
color:white;
padding:8px 12px;
text-decoration:none;
border-radius:5px;
margin-left:5px;
}

</style>

</head>

<body>

<div class="header">

<h2>📂 Manage Projects</h2>

<a href="add-project.php"
class="edit-btn">

+ Add Project

</a>

</div>

<div class="card">

<h3>
Total Projects:
<?php echo $totalProjects; ?>
</h3>

</div>

<table>

<tr>

<th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Location</th>
<th>Status</th>
<th>Progress</th>
<th>Home Show</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img
src="../<?php echo $row['image']; ?>"
class="project-img">

</td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['location']; ?></td>
<td><?= $row['status']; ?></td>

<td><?= $row['progress']; ?>%</td>

<td>
<?= $row['home_show'] ? 'Yes' : 'No'; ?>
</td>

<td>

<a
href="edit-project.php?id=<?php echo $row['id']; ?>"
class="edit-btn">

Edit

</a>

<a
href="delete-project.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete Project?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</body>

</html>

