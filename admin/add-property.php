<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../includes/database.php';

/** @var mysqli $conn */

$success = "";
$error = "";

if (isset($_POST['submit'])) {

    $title = trim($_POST['title']);
    $location = trim($_POST['location']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $page_type = trim($_POST['page_type']);
    $featured = $_POST['featured'];
  
    // Check Image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        $fileName = $_FILES['image']['name'];
        $fileTmp = $_FILES['image']['tmp_name'];

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed)) {
            $error = "Only JPG, JPEG, PNG and WEBP files are allowed.";
        } else {

            $newFileName = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);

            $uploadDir = "../assets/uploads/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $uploadPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $uploadPath)) {

                $image = "assets/uploads/" . $newFileName;

   $stmt = $conn->prepare("
INSERT INTO properties
(
    title,
    location,
    price,
    category,
    description,
    image,
    page_type,
    featured
)
VALUES
(?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "ssssssss",
    $title,
    $location,
    $price,
    $category,
    $description,
    $image,
    $page_type,
    $featured
);

              if ($stmt->execute()) {

    $property_id = $conn->insert_id;

    // Gallery Images Upload
    if(!empty($_FILES['gallery']['name'][0])){

        foreach($_FILES['gallery']['name'] as $key => $name){

            if(empty($name)) continue;

            $tmp = $_FILES['gallery']['tmp_name'][$key];

            $galleryFileName =
            time().'_'.$key.'_'.preg_replace(
                "/[^a-zA-Z0-9.]/",
                "_",
                $name
            );

            move_uploaded_file(
                $tmp,
                "../assets/uploads/".$galleryFileName
            );

            $galleryImage =
            "assets/uploads/".$galleryFileName;

            mysqli_query(
                $conn,
                "INSERT INTO property_images
                (property_id,image)
                VALUES
                ('$property_id','$galleryImage')"
            );
        }
    }

    $success = "Property Added Successfully!";

} else {

    $error = "Database Error: " . $stmt->error;

}

                $stmt->close();

            } else {
                $error = "Image Upload Failed!";
            }
        }

    } else {
        $error = "Please Select an Image!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Property</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

body{
    font-family:'Poppins',sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:40px 20px;
}

.container{
    max-width:1100px;
    margin:auto;
    background:#fff;
    padding:40px;
    border-radius:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    animation:fadeUp .5s ease;
}

h1{
    color:#d4a017;
    font-size:38px;
    margin-bottom:30px;
    font-weight:700;
}

.success{
    background:#e8fff0;
    color:#0f8b3d;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:600;
}

.error{
    background:#fff0f0;
    color:#d93025;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:600;
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

.full{
    grid-column:1/3;
}

label{
    margin-bottom:8px;
    font-weight:600;
    color:#333;
}

input,
select,
textarea{
    width:100%;
    padding:15px;
    border:1px solid #ddd;
    border-radius:12px;
    font-size:15px;
    transition:.3s;
    box-sizing:border-box;
}

input:focus,
select:focus,
textarea:focus{
    outline:none;
    border-color:#d4a017;
    box-shadow:0 0 0 4px rgba(212,160,23,.15);
}

textarea{
    min-height:150px;
    resize:vertical;
}

.file-box{
    padding:15px;
    border:2px dashed #ddd;
    border-radius:12px;
    background:#fafafa;
}

button{
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

button:hover{
    background:#b8890f;
    transform:translateY(-3px);
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@media(max-width:768px){

.container{
    padding:25px;
}

.form-grid{
    grid-template-columns:1fr;
}

.full{
    grid-column:auto;
}

h1{
    font-size:30px;
}

}


</style>

</head>
<body>

<div class="container">

<h1>Add Property</h1>

<?php if($success): ?>
    <div class="success"><?php echo $success; ?></div>
<?php endif; ?>

<?php if($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-grid">

    <div class="form-group">
        <label>Property Title</label>
        <input
            type="text"
            name="title"
            class="form-control"
            placeholder="Property Title"
            required>
    </div>

    <div class="form-group">
        <label>Location</label>
        <input
            type="text"
            name="location"
            class="form-control"
            placeholder="Location"
            required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input
            type="text"
            name="price"
            class="form-control"
            placeholder="Price (Ex: 25 Lakh / 1.2 Crore)"
            required>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control" required>

            <option value="">Select Category</option>

            <option value="Plot">Plot</option>
            <option value="Villa">Villa</option>
            <option value="House">House</option>
            <option value="Agriculture Land">Agriculture Land</option>
            <option value="Flat & Duplex">Flat & Duplex</option>
            <option value="Resell Plot">Resell Plot</option>

        </select>
    </div>

    <div class="form-group">
        <label>Page Type</label>

        <select name="page_type" class="form-control" required>

            <option value="">Select Page</option>

            <option value="own-sites">
                Own Sites
            </option>

            <option value="resell-plots">
                Resell Plots
            </option>

            <option value="house-sell">
                House Sell
            </option>

            <option value="agriculture-land">
                Agriculture Land
            </option>

            <option value="flat-duplex">
                Flat & Duplex
            </option>

            <option value="plots">
                Plots
            </option>

        </select>

    </div>

    <div class="form-group">
        <label>Home Page Visibility</label>

        <select
            name="featured"
            class="form-control"
            required>

            <option value="0">
                Normal Property
            </option>

            <option value="1">
                Show On Home Page
            </option>

        </select>

    </div>

    <div class="form-group full">

        <label>Property Description</label>

        <textarea
            name="description"
            class="form-control"
            rows="6"
            placeholder="Property Description"></textarea>

    </div>

    <div class="form-group">

        <label>Main Property Image</label>

        <div class="file-box">

            <input
                type="file"
                name="image"
                required>

        </div>

    </div>

    <div class="form-group">

        <label>Property Gallery Images</label>

        <div class="file-box">

            <input
                type="file"
                name="gallery[]"
                multiple
                accept=".jpg,.jpeg,.png,.webp">

        </div>

    </div>

    <div class="form-group full">

        <button
            type="submit"
            name="submit"
            class="btn-submit">

            Add Property

        </button>

    </div>

</div>

</form>

</div>

</body>
</html>