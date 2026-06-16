
<?php

include 'includes/database.php';

$id = (int)$_GET['id'];

$query = mysqli_query(
$conn,
"SELECT * FROM blogs WHERE id=$id"
);

$blog = mysqli_fetch_assoc($query);

if(!$blog){
    die("Blog Not Found");
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
<?php echo $blog['title']; ?>
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
<!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
<style>

body{
background:#f5f5f5;
font-family:Arial,sans-serif;
}

.blog-container{
max-width:1000px;
margin:50px auto;
background:white;
border-radius:12px;
overflow:hidden;
box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.blog-image img{
width:100%;
height:500px;
object-fit:cover;
}

.blog-content{
padding:40px;
}

.blog-title{
font-size:36px;
font-weight:700;
margin-bottom:15px;
color:#111827;
}

.blog-date{
color:#777;
margin-bottom:25px;
}

.blog-text{
font-size:18px;
line-height:1.9;
color:#444;
}

.back-btn{
display:inline-block;
margin-top:30px;
padding:12px 25px;
background:#d4a017;
color:white;
text-decoration:none;
border-radius:6px;
}

@media(max-width:768px){

.blog-title{
font-size:28px;
}

.blog-image img{
height:250px;
}

.blog-content{
padding:20px;
}

}

</style>

</head>

<body>

<div class="container">

<div class="blog-container">

<div class="blog-image">

<img
src="<?php echo $blog['image']; ?>"
alt="<?php echo $blog['title']; ?>">

</div>

<div class="blog-content">

<h1 class="blog-title">

<?php echo $blog['title']; ?>

</h1>

<div class="blog-date">

📅
<?php echo date(
'd F Y',
strtotime($blog['created_at'])
); ?>

</div>

<div class="blog-text">

<?php echo nl2br($blog['content']); ?>

</div>

<a
href="blog.php"
class="back-btn">

← Back To Blog

</a>

</div>

</div>

</div>

</body>

</html>

