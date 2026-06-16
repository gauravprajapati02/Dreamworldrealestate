<?php
include 'includes/database.php';

$query = mysqli_query($conn,"SELECT * FROM properties ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Properties | Dream World</title>
    <link rel="icon" href="assets/images/logo.png">
<style>
body{
    font-family:Arial;
    background:#f5f5f5;
}

.container{
    width:90%;
    margin:auto;
}

.grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.card{
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card-body{
    padding:15px;
}

.price{
    color:#d4a017;
    font-size:22px;
    font-weight:bold;
}

.btn{
    display:inline-block;
    padding:10px 20px;
    background:#111827;
    color:white;
    text-decoration:none;
    border-radius:5px;
}
@media(max-width:992px){
.grid{
grid-template-columns:repeat(2,1fr);
}
}

@media(max-width:768px){
.grid{
grid-template-columns:1fr;
}
}
</style>

</head>
<body>

<div class="container">

<h1>All Properties</h1>

<div class="grid">

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<div class="card">

<img src="<?php echo $row['image']; ?>" alt="Property">

<div class="card-body">

<h3><?php echo $row['title']; ?></h3>

<p><?php echo $row['location']; ?></p>

<p class="price">
<?php echo $row['price']; ?>
</p>
<a href="property-details.php?id=<?php echo $row['id']; ?>"
class="btn">
View Details
</a>

</div>

</div>

<?php } ?>

</div>

</div>
<?php include 'includes/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>