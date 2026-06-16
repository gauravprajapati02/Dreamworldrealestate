
<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$id = (int)$_GET['id'];

$query = mysqli_query(
$conn,
"SELECT * FROM projects WHERE id=$id"
);

$project = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

 $title = mysqli_real_escape_string($conn,$_POST['title']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$description = mysqli_real_escape_string($conn,$_POST['description']);

$status = mysqli_real_escape_string($conn,$_POST['status']);
$progress = (int)$_POST['progress'];
$home_show = (int)$_POST['home_show'];

mysqli_query(
$conn,
"UPDATE projects SET
title='$title',
location='$location',
description='$description',
status='$status',
progress='$progress',
home_show='$home_show'
WHERE id=$id"
);
    header("Location: manage-projects.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Project</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

.container{
    max-width:1100px;
    margin:40px auto;
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.page-title{
    font-size:32px;
    color:#d4a017;
    margin-bottom:30px;
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



<h2 class="page-title">✏️ Edit Project</h2>

<form method="POST" class="form-grid">

    <div class="form-group">
        <label>Project Title</label>
        <input
        type="text"
        name="title"
        class="form-control"
        value="<?php echo $project['title']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Project Location</label>
        <input
        type="text"
        name="location"
        class="form-control"
        value="<?php echo $project['location']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Project Status</label>

        <select
        name="status"
        class="form-control">

            <option value="Booking Open"
            <?php if($project['status']=='Booking Open') echo 'selected'; ?>>
                Booking Open
            </option>

            <option value="New Launch"
            <?php if($project['status']=='New Launch') echo 'selected'; ?>>
                New Launch
            </option>

            <option value="Coming Soon"
            <?php if($project['status']=='Coming Soon') echo 'selected'; ?>>
                Coming Soon
            </option>

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
        value="<?php echo $project['progress']; ?>">
    </div>

    <div class="form-group">
        <label>Show On Home Page</label>

        <select
        name="home_show"
        class="form-control">

            <option value="1"
            <?php if($project['home_show']==1) echo 'selected'; ?>>
                Yes
            </option>

            <option value="0"
            <?php if($project['home_show']==0) echo 'selected'; ?>>
                No
            </option>

        </select>
    </div>

    <div class="form-group">
        <label>Current Status</label>

        <input
        type="text"
        class="form-control"
        value="<?php echo $project['status']; ?>"
        readonly>
    </div>

    <div class="form-group full">
        <label>Project Description</label>

        <textarea
        name="description"
        class="form-control"
        rows="6"><?php echo $project['description']; ?></textarea>
    </div>

    <div class="form-group full">
        <button
        type="submit"
        name="update"
        class="btn-submit">

            Update Project

        </button>
    </div>

</form>

</div>

</body>
</html>

