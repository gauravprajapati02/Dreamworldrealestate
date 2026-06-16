<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/database.php';
/** @var mysqli $conn */
$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM properties WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $page_type = $_POST['page_type'];
    $featured = $_POST['featured'];
    mysqli_query($conn,"
  UPDATE properties SET
title='$title',
location='$location',
price='$price',
category='$category',
description='$description',
page_type='$page_type',
featured='$featured'
WHERE id='$id'
    ");

    header("Location: manage-properties.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Property</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    font-family:'Poppins',sans-serif;
    background:#f4f6f9;
    padding:40px 20px;
}

.container{
    max-width:1100px;
    margin:40px auto;
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

h2{
    color:#d4a017;
    margin-bottom:30px;
    font-size:32px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    margin-bottom:8px;
    font-weight:600;
    color:#333;
}

.full{
    grid-column:1 / 3;
}

.form-control{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    font-size:15px;
    box-sizing:border-box;
}

.form-control:focus{
    outline:none;
    border-color:#d4a017;
    box-shadow:0 0 0 4px rgba(212,160,23,.15);
}

textarea.form-control{
    min-height:180px;
}

.btn-submit{
    background:#d4a017;
    color:#fff;
    border:none;
    padding:15px 35px;
    border-radius:12px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn-submit:hover{
    background:#b8890f;
}

@media(max-width:768px){

.form-grid{
    grid-template-columns:1fr;
}

.full{
    grid-column:auto;
}

.container{
    padding:25px;
}

}

</style>

</head>

<body>

<div class="form-box">

<h2>Edit Property</h2>

<form method="POST">

<div class="form-grid">

    <div class="form-group">
        <label>Property Title</label>
        <input
        type="text"
        name="title"
        class="form-control"
        value="<?php echo $row['title']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Location</label>
        <input
        type="text"
        name="location"
        class="form-control"
        value="<?php echo $row['location']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input
        type="text"
        name="price"
        class="form-control"
        value="<?php echo $row['price']; ?>"
        required>
    </div>

    <div class="form-group">
        <label>Category</label>

        <select
        name="category"
        class="form-control">

            <option value="Plot"
            <?php if($row['category']=='Plot') echo 'selected'; ?>>
            Plot
            </option>

            <option value="Villa"
            <?php if($row['category']=='Villa') echo 'selected'; ?>>
            Villa
            </option>

            <option value="House"
            <?php if($row['category']=='House') echo 'selected'; ?>>
            House
            </option>

            <option value="Agriculture Land"
            <?php if($row['category']=='Agriculture Land') echo 'selected'; ?>>
            Agriculture Land
            </option>

            <option value="Flat & Duplex"
            <?php if($row['category']=='Flat & Duplex') echo 'selected'; ?>>
            Flat & Duplex
            </option>

            <option value="Resell Plot"
            <?php if($row['category']=='Resell Plot') echo 'selected'; ?>>
            Resell Plot
            </option>

        </select>
    </div>

    <div class="form-group">
        <label>Page Type</label>

        <select
        name="page_type"
        class="form-control"
        required>

            <option value="own-sites"
            <?php if($row['page_type']=='own-sites') echo 'selected'; ?>>
            Own Sites
            </option>

            <option value="resell-plots"
            <?php if($row['page_type']=='resell-plots') echo 'selected'; ?>>
            Resell Plots
            </option>

            <option value="house-sell"
            <?php if($row['page_type']=='house-sell') echo 'selected'; ?>>
            House Sell
            </option>

            <option value="agriculture-land"
            <?php if($row['page_type']=='agriculture-land') echo 'selected'; ?>>
            Agriculture Land
            </option>

            <option value="flat-duplex"
            <?php if($row['page_type']=='flat-duplex') echo 'selected'; ?>>
            Flat & Duplex
            </option>

            <option value="plots"
            <?php if($row['page_type']=='plots') echo 'selected'; ?>>
            Plots
            </option>

        </select>
    </div>

    <div class="form-group">
        <label>Home Page Visibility</label>

        <select
        name="featured"
        class="form-control">

            <option value="1"
            <?php if($row['featured']==1) echo 'selected'; ?>>
            Show On Home Page
            </option>

            <option value="0"
            <?php if($row['featured']==0) echo 'selected'; ?>>
            Normal Property
            </option>

        </select>
    </div>

    <div class="form-group full">

        <label>Description</label>

        <textarea
        name="description"
        class="form-control"
        rows="6"><?php echo $row['description']; ?></textarea>

    </div>

    <div class="form-group full">

        <button
        type="submit"
        name="update"
        class="btn-submit">

        Update Property

        </button>

    </div>

</div>

</form>

</div>

</body>
</html>