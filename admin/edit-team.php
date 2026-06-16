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
"SELECT * FROM team WHERE id='$id'"
);

$row = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

$name = $_POST['name'];
$designation = $_POST['designation'];
$home_show = $_POST['home_show'];

mysqli_query(
$conn,
"UPDATE team SET

name='$name',
designation='$designation',
home_show='$home_show'

WHERE id='$id'"
);

header("Location: manage-team.php");
exit();

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Team</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>
body{
    background:#f4f6f9;
    font-family:'Poppins',sans-serif;
}

.container{
    max-width:900px;
    margin:40px auto;
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.page-title{
    font-size:30px;
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
    padding:15px;
    background:#d4a017;
    color:#fff;
    border:none;
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

<h2 class="page-title">👤 Edit Team Member</h2>

<form method="POST" class="form-grid">

    <div class="form-group">
        <label>Member Name</label>

        <input
        type="text"
        name="name"
        class="form-control"
        value="<?php echo $row['name']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Designation</label>

        <input
        type="text"
        name="designation"
        class="form-control"
        value="<?php echo $row['designation']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Show On Home Page</label>

        <select
        name="home_show"
        class="form-control">

            <option value="1"
            <?php if($row['home_show']==1) echo "selected"; ?>>
                Yes
            </option>

            <option value="0"
            <?php if($row['home_show']==0) echo "selected"; ?>>
                No
            </option>

        </select>
    </div>

    <div class="form-group">
        <label>Current Status</label>

        <input
        type="text"
        class="form-control"
        value="<?php echo ($row['home_show']==1) ? 'Visible On Homepage' : 'Hidden From Homepage'; ?>"
        readonly>
    </div>

    <div class="form-group full">
        <button
        type="submit"
        name="update"
        class="btn-submit">

            Update Member

        </button>
    </div>

</form>

</body>
</html>