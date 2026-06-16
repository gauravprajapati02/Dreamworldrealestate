<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$success = "";
$error = "";

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $designation = mysqli_real_escape_string($conn,$_POST['designation']);

    $facebook = mysqli_real_escape_string($conn,$_POST['facebook']);
    $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
    $linkedin = mysqli_real_escape_string($conn,$_POST['linkedin']);

    $filename = time().'_'.$_FILES['image']['name'];
$home_show = $_POST['home_show'];
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../assets/uploads/".$filename
    );

    $image = "assets/uploads/".$filename;

    $sql = "INSERT INTO team
    (
        name,
        designation,
        image,
        facebook,
        instagram,
        linkedin,
        home_show
    )
    VALUES
    (
        '$name',
        '$designation',
        '$image',
        '$facebook',
        '$instagram',
        '$linkedin',
        '$home_show'
    )";

    if(mysqli_query($conn,$sql)){
        $success = "Team Member Added Successfully";
    }else{
        $error = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Team Member</title>

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
    font-size:32px;
    font-weight:700;
    color:#d4a017;
    margin-bottom:30px;
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
    outline:none;
    border-color:#d4a017;
    box-shadow:0 0 0 4px rgba(212,160,23,.15);
}

.btn-submit{
    width:100%;
    background:#d4a017;
    color:white;
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



<?php echo $success; ?>
<?php echo $error; ?>

<h2 class="page-title">👥 Add Team Member</h2>

<form method="POST" enctype="multipart/form-data" class="form-grid">

    <div class="form-group">
        <label>Full Name</label>
        <input
        type="text"
        name="name"
        class="form-control"
        placeholder="Enter Team Member Name"
        required>
    </div>

    <div class="form-group">
        <label>Designation</label>
        <input
        type="text"
        name="designation"
        class="form-control"
        placeholder="Enter Designation"
        required>
    </div>

    <div class="form-group">
        <label>Facebook Profile</label>
        <input
        type="url"
        name="facebook"
        class="form-control"
        placeholder="https://facebook.com/username">
    </div>

    <div class="form-group">
        <label>Instagram Profile</label>
        <input
        type="url"
        name="instagram"
        class="form-control"
        placeholder="https://instagram.com/username">
    </div>

    <div class="form-group">
        <label>LinkedIn Profile</label>
        <input
        type="url"
        name="linkedin"
        class="form-control"
        placeholder="https://linkedin.com/in/username">
    </div>

    <div class="form-group">
        <label>Show On Home Page</label>
        <select
        name="home_show"
        class="form-control">

            <option value="1">Yes</option>
            <option value="0">No</option>

        </select>
    </div>

    <div class="form-group full">
        <label>Profile Photo</label>
        <input
        type="file"
        name="image"
        class="form-control"
        required>
    </div>

    <div class="form-group full">
        <button
        type="submit"
        name="submit"
        class="btn-submit">

            Add Team Member

        </button>
    </div>

</form>

</div>

</body>
</html>