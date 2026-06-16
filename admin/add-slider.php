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

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $subtitle = mysqli_real_escape_string(
        $conn,
        $_POST['subtitle']
    );

    $status = $_POST['status'];

    if(isset($_FILES['image']) &&
       $_FILES['image']['error']==0){

        $imageName =
        time().'_'.$_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../assets/uploads/".$imageName
        );

        $image =
        "assets/uploads/".$imageName;

        $insert = mysqli_query(
            $conn,
            "INSERT INTO hero_slides
            (
                title,
                subtitle,
                image,
                status
            )
            VALUES
            (
                '$title',
                '$subtitle',
                '$image',
                '$status'
            )"
        );

        if($insert){
            $success =
            "Slider Added Successfully!";
        }else{
            $error =
            mysqli_error($conn);
        }

    }else{

        $error =
        "Please Select Image";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Slider</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f4f6f9;
    font-family:Poppins,sans-serif;
}

.container{
    max-width:900px;
    margin:40px auto;
    background:#fff;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

h2{
    color:#d4a017;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

input,
textarea,
select{

    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    box-sizing:border-box;

}

textarea{
    min-height:150px;
}

button{

    background:#d4a017;
    color:white;
    border:none;
    padding:14px 30px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;

}

button:hover{
    background:#b8890f;
}

.success{

    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;

}

.error{

    background:#f8d7da;
    color:#721c24;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;

}

</style>

</head>

<body>

<div class="container">

<h2>🎞 Add Hero Slider</h2>

<?php if($success){ ?>
<div class="success">
<?php echo $success; ?>
</div>
<?php } ?>

<?php if($error){ ?>
<div class="error">
<?php echo $error; ?>
</div>
<?php } ?>

<form method="POST"
enctype="multipart/form-data">

<div class="form-group">

<label>Slider Title</label>

<input
type="text"
name="title"
required>

</div>

<div class="form-group">

<label>Slider Subtitle</label>

<textarea
name="subtitle"></textarea>

</div>

<div class="form-group">

<label>Slider Image</label>

<input
type="file"
name="image"
multiple
required>

</div>

<div class="form-group">

<label>Status</label>

<select name="status">

<option value="1">
Active
</option>

<option value="0">
Inactive
</option>

</select>

</div>

<button
type="submit"
name="submit">

Save Slider

</button>

</form>

</div>

</body>

</html>