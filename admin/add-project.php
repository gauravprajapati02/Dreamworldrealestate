
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
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);

    $image = "assets/uploads/" . time() . "_" . $_FILES['image']['name'];
    $status = $_POST['status'];
$progress = $_POST['progress'];
$home_show = $_POST['home_show'];
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../assets/uploads/" . time() . "_" . $_FILES['image']['name']
    );

    mysqli_query(
    $conn,
    "INSERT INTO projects
    (
        title,
        location,
        image,
        description,
        status,
        progress,
        home_show
    )
    VALUES
    (
        '$title',
        '$location',
        '$image',
        '$description',
        '$status',
        '$progress',
        '$home_show'
    )"
);

    $success = "Project Added Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Project</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f4f6f9;
    font-family:'Poppins',sans-serif;
}

.container{
    max-width:1100px;
    margin:40px auto;
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.page-title{
    color:#d4a017;
    margin-bottom:30px;
    font-size:32px;
    font-weight:700;
}

.form-grid{
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
    outline:none;
    border-color:#d4a017;
    box-shadow:0 0 0 4px rgba(212,160,23,.15);
}

textarea.form-control{
    resize:none;
}

.btn-submit{
    width:100%;
    background:#d4a017;
    color:#fff;
    border:none;
    padding:14px;
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

.form-grid{
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

<h2 class="page-title">📂 Add New Project</h2>

<form method="POST" enctype="multipart/form-data" class="form-grid">

    <div class="form-group">
        <label>Project Title</label>
        <input
        type="text"
        name="title"
        class="form-control"
        placeholder="Enter Project Title"
        required>
    </div>

    <div class="form-group">
        <label>Project Location</label>
        <input
        type="text"
        name="location"
        class="form-control"
        placeholder="Enter Project Location"
        required>
    </div>

    <div class="form-group full">
        <label>Project Image</label>
        <input
        type="file"
        name="image"
        class="form-control"
        required>
    </div>

    <div class="form-group full">
        <label>Project Description</label>
        <textarea
        name="description"
        class="form-control"
        rows="6"
        placeholder="Enter Project Description"></textarea>
    </div>

    <div class="form-group">
        <label>Project Status</label>
        <select
        name="status"
        class="form-control">

            <option value="Booking Open">Booking Open</option>
            <option value="New Launch">New Launch</option>
            <option value="Coming Soon">Coming Soon</option>

        </select>
    </div>

    <div class="form-group">
        <label>Project Progress (%)</label>
        <input
        type="number"
        name="progress"
        class="form-control"
        min="0"
        max="100"
        placeholder="0 - 100">
    </div>

    <div class="form-group">
        <label>Show On Home Page</label>
        <select
        name="home_show"
        class="form-control">

            <option value="0">No</option>
            <option value="1">Yes</option>

        </select>
    </div>

    <div class="form-group">
        <label>&nbsp;</label>
        <button
        type="submit"
        name="submit"
        class="btn-submit">
            Save Project
        </button>
    </div>

</form>

</div>

</body>
</html>
```
