
<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */

$id = (int)$_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM hero_slides WHERE id='$id'"
);

$slider = mysqli_fetch_assoc($result);

if(!$slider){
    die("Slider Not Found");
}

$success = "";
$error = "";

if(isset($_POST['update'])){

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $subtitle = mysqli_real_escape_string(
        $conn,
        $_POST['subtitle']
    );

    $status = (int)$_POST['status'];

    $image = $slider['image'];

    // Image Upload
    if(!empty($_FILES['image']['name'])){

        $uploadDir = "../assets/uploads/sliders/";

        // Create folder if not exists
        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        $fileName =
        time().'_'.basename($_FILES['image']['name']);

        if(
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $uploadDir.$fileName
            )
        ){

            $image =
            "assets/uploads/sliders/".$fileName;

        }else{

            $error = "Image Upload Failed!";

        }
    }

    if(empty($error)){

        $update = mysqli_query(
            $conn,
            "UPDATE hero_slides SET
            title='$title',
            subtitle='$subtitle',
            image='$image',
            status=$status
            WHERE id='$id'"
        );

        if($update){

            $success = "Slider Updated Successfully";

            header("Refresh:1");

        }else{

            $error = mysqli_error($conn);

        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Slider</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    background:#f5f7fb;
    font-family:Arial,sans-serif;
    padding:40px;
}

.container{
    max-width:800px;
    margin:auto;
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

h2{
    margin-bottom:20px;
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
    resize:none;
}

.preview{
    width:220px;
    border-radius:10px;
    margin-top:10px;
}

.btn{
    background:#d4a017;
    color:#fff;
    border:none;
    padding:14px 25px;
    border-radius:10px;
    cursor:pointer;
}

.success{
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

</style>

</head>

<body>

<div class="container">

<h2>🎞 Edit Slider</h2>

<?php if($success){ ?>
<div class="success">
<?php echo $success; ?>
</div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">

<label>Slider Title</label>

<input
type="text"
name="title"
value="<?php echo $slider['title']; ?>"
required>

</div>

<div class="form-group">

<label>Slider Subtitle</label>

<textarea
name="subtitle"
rows="5"
required><?php echo $slider['subtitle']; ?></textarea>

</div>

<div class="form-group">

<label>Current Image</label>

<img
src="../<?php echo $slider['image']; ?>"
class="preview">

</div>

<div class="form-group">

<label>Change Image</label>

<input
type="file"
name="image">

</div>

<div class="form-group">

<label>Status</label>

<select name="status">

<option value="1"
<?php if($slider['status']==1) echo 'selected'; ?>>
Active
</option>

<option value="0"
<?php if($slider['status']==0) echo 'selected'; ?>>
Inactive
</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn">

Update Slider

</button>

</form>

</div>

</body>
</html>