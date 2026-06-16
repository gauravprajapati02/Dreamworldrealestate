<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
if(!isset($_GET['id'])){
    die("Blog ID Missing");
}

$id = intval($_GET['id']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM blogs WHERE id='$id'"
);

if(mysqli_num_rows($query) == 0){
    die("Blog Not Found");
}

$row = mysqli_fetch_assoc($query);

$success = "";
$error = "";

if(isset($_POST['update'])){

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $content = mysqli_real_escape_string(
        $conn,
        $_POST['content']
    );

    $update = mysqli_query(
        $conn,
        "UPDATE blogs SET
        title='$title',
        content='$content'
        WHERE id='$id'"
    );

    if($update){

        $success = "Blog Updated Successfully";

        $query = mysqli_query(
            $conn,
            "SELECT * FROM blogs WHERE id='$id'"
        );

        $row = mysqli_fetch_assoc($query);

    }else{

        $error = mysqli_error($conn);

    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Blog</title>
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
textarea{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    box-sizing:border-box;
}

textarea{
    min-height:300px;
}

button{
    background:#d4a017;
    color:#fff;
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

<h2>📝 Edit Blog</h2>

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

<form method="POST">

<div class="form-group">

<label>Blog Title</label>

<input
type="text"
name="title"
value="<?php echo $row['title']; ?>"
required>

</div>

<div class="form-group">

<label>Blog Content</label>

<textarea
name="content"
required><?php echo $row['content']; ?></textarea>

</div>

<button
type="submit"
name="update">

Update Blog

</button>

</form>

</div>

</body>
</html>