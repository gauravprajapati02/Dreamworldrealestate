
<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
if(isset($_POST['submit'])){

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $content = mysqli_real_escape_string($conn,$_POST['content']);

    $fileName = time().'_'.$_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../assets/uploads/".$fileName
    );

    $image = "assets/uploads/".$fileName;

    mysqli_query(
        $conn,
        "INSERT INTO blogs
        (title,image,content)
        VALUES
        ('$title','$image','$content')"
    );

    $success = "Blog Added Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Blog</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f4f6f9;
    font-family:'Poppins',sans-serif;
}

.container{
    max-width:1000px;
    margin:40px auto;
    background:#fff;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:#d4a017;
    margin-bottom:30px;
}

.blog-form{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.full{
    grid-column:1 / 3;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#333;
}

.form-control{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    font-size:15px;
    box-sizing:border-box;
    transition:.3s;
}

.form-control:focus{
    border-color:#d4a017;
    box-shadow:0 0 0 4px rgba(212,160,23,.15);
    outline:none;
}

textarea.form-control{
    resize:vertical;
    min-height:300px;
}

.btn-submit{
    width:100%;
    background:#d4a017;
    color:#fff;
    border:none;
    padding:15px;
    border-radius:12px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-submit:hover{
    background:#b8890f;
    transform:translateY(-2px);
}

@media(max-width:768px){

.blog-form{
    grid-template-columns:1fr;
}

.full{
    grid-column:auto;
}

}

</style>

</head>

<body>

<div class="container">



<?php if(isset($success)){ ?>
<div class="success">
<?php echo $success; ?>
</div>
<?php } ?>

<h2 class="page-title">📝 Add New Blog</h2>

<form method="POST" enctype="multipart/form-data" class="blog-form">

    <div class="form-group">
        <label>Blog Title</label>

        <input
        type="text"
        name="title"
        class="form-control"
        placeholder="Enter Blog Title"
        required>
    </div>

    <div class="form-group">
        <label>Featured Image</label>

        <input
        type="file"
        name="image"
        class="form-control"
        required>
    </div>

    <div class="form-group full">
        <label>Blog Content</label>

        <textarea
        name="content"
        rows="12"
        class="form-control"
        placeholder="Write your blog content here..."
        required></textarea>
    </div>

    <div class="form-group full">
        <button
        type="submit"
        name="submit"
        class="btn-submit">

            Publish Blog

        </button>
    </div>

</form>
</div>

</body>
</html>
```
