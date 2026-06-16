
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
"SELECT * FROM blogs ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Blogs</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f6f9;
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
color:#111827;
}

.table-card{
background:#fff;
border-radius:20px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

table{
width:100%;
border-collapse:collapse;
}

thead{
background:#0f172a;
color:#fff;
}

th{
padding:18px;
font-size:15px;
font-weight:600;
text-align:center;
}

td{
padding:18px;
text-align:center;
border-bottom:1px solid #eee;
vertical-align:middle;
}

tr:hover{
background:#fafafa;
}

.blog-img{
width:90px;
height:65px;
border-radius:10px;
object-fit:cover;
box-shadow:0 3px 10px rgba(0,0,0,.15);
}

.blog-title{
font-weight:600;
color:#111827;
}

.date{
color:#6b7280;
font-size:14px;
}

.action-buttons{
display:flex;
justify-content:center;
gap:10px;
}

.edit-btn{
background:#d4a017;
color:#fff;
padding:10px 18px;
border-radius:8px;
text-decoration:none;
font-size:14px;
font-weight:600;
transition:.3s;
}

.edit-btn:hover{
background:#b8890f;
transform:translateY(-2px);
}

.delete-btn{
background:#ef4444;
color:#fff;
padding:10px 18px;
border-radius:8px;
text-decoration:none;
font-size:14px;
font-weight:600;
transition:.3s;
}

.delete-btn:hover{
background:#dc2626;
transform:translateY(-2px);
}

@media(max-width:768px){

body{
padding:15px;
}

.table-card{
overflow-x:auto;
}

table{
min-width:700px;
}

.page-title{
font-size:24px;
}

}

</style>

</head>

<body>

<div class="page-header">

<h2 class="page-title">
📚 Manage Blogs
</h2>

</div>

<div class="table-card">

<table>

<thead>

<tr>
<th>ID</th>
<th>Image</th>
<th>Blog Title</th>
<th>Published Date</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>

<img
src="../<?php echo $row['image']; ?>"
class="blog-img">

</td>

<td class="blog-title">

<?php echo $row['title']; ?>

</td>

<td class="date">

<?php echo $row['created_at']; ?>

</td>

<td>

<div class="action-buttons">

<a
href="edit-blog.php?id=<?php echo $row['id']; ?>"
class="edit-btn">

✏ Edit

</a>

<a
href="delete-blog.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this blog?')">

🗑 Delete

</a>

</div>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>