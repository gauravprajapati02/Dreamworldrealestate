<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$query = mysqli_query(
$conn,
"SELECT * FROM team ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Team</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f4f6f9;
    font-family:'Poppins',sans-serif;
    padding:30px;
}

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#d4a017;
}

.team-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 35px rgba(0,0,0,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#d4a017;
    color:#fff;
}

th{
    padding:18px;
    text-align:left;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

tr:hover{
    background:#fafafa;
}

.member-img{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #d4a017;
}

.edit-btn{
    background:#198754;
    color:#fff;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
    margin-right:5px;
}

.delete-btn{
    background:#dc3545;
    color:#fff;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
}

.edit-btn:hover,
.delete-btn:hover{
    opacity:.85;
}

.badge{
    background:#f8f0d2;
    color:#b8890f;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

@media(max-width:768px){

table{
    display:block;
    overflow-x:auto;
    white-space:nowrap;
}

}

</style>

</head>

<body>

<h2 class="page-title">👥 Manage Team Members</h2>

<div class="team-card">

<table>

<thead>
<tr>
<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Designation</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td>
#<?php echo $row['id']; ?>
</td>

<td>
<img
src="../<?php echo $row['image']; ?>"
class="member-img">
</td>

<td>
<strong>
<?php echo $row['name']; ?>
</strong>
</td>

<td>
<span class="badge">
<?php echo $row['designation']; ?>
</span>
</td>

<td>

<a
href="edit-team.php?id=<?php echo $row['id']; ?>"
class="edit-btn">
✏ Edit
</a>

<a
href="delete-team.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete Team Member?')">
🗑 Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>