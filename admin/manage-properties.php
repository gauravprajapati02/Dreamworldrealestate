
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
    "SELECT * FROM properties ORDER BY id DESC"
);

$totalProperties = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Properties</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    margin:0;
    padding:30px;
    background:#f5f5f5;
    font-family:Arial, sans-serif;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h2{
    color:#111827;
}

.back-btn{
    background:#111827;
    color:white;
    padding:10px 18px;
    text-decoration:none;
    border-radius:6px;
}

.stats{
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.stats h3{
    margin:0;
    color:#d4a017;
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
    padding:14px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.property-img{
    width:80px;
    height:60px;
    object-fit:cover;
    border-radius:6px;
}

.edit-btn{
    background:#d4a017;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
    margin-right:5px;
}

.delete-btn{
    background:red;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
}

.no-data{
    text-align:center;
    padding:30px;
    color:#777;
}
body{
    margin:0;
    padding:30px;
    background:#f4f6f9;
    font-family:'Segoe UI',sans-serif;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.stats{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    margin-bottom:20px;
}

table{
    width:100%;
    background:white;
    border-collapse:collapse;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

th{
    background:#0f172a;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

tr:hover{
    background:#fafafa;
}

.property-img{
    width:90px;
    height:70px;
    object-fit:cover;
    border-radius:8px;
}

.edit-btn{
    background:#f59e0b;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
}

.delete-btn{
    background:#ef4444;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
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

<div class="header">

    <h2>🏡 Manage Properties</h2>

    <a href="dashboard.php" class="back-btn">
        ← Back Dashboard
    </a>

</div>

<div class="stats">

    <h3>Total Properties: <?php echo $totalProperties; ?></h3>

</div>

<table>

<tr>
    <th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Location</th>
<th>Price</th>
<th>Category</th>
<th>Home Page</th>
<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
    <img
    src="../<?php echo $row['image']; ?>"
    class="property-img">
</td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['price']; ?></td>

<td><?php echo $row['category']; ?></td>
<td>

<?php

if($row['featured'] == 1){

    echo "<span style='color:green;font-weight:bold;'>
    ⭐ Featured
    </span>";

}else{

    echo "<span style='color:#999;'>
    Normal
    </span>";

}

?>

</td>
<td>

<?php

echo ucwords(
    str_replace(
        "-",
        " ",
        $row['page_type']
    )
);

?>

</td>

<td>

<a
href="edit-property.php?id=<?php echo $row['id']; ?>"
class="edit-btn">

Edit

</a>

<a
href="delete-property.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Are you sure you want to delete this property?')">

Delete

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="7" class="no-data">

No Properties Found

</td>

</tr>

<?php } ?>

</table>

</body>

</html>
