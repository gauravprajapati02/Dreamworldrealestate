<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}


?>
<?php

include '../includes/database.php';
/** @var mysqli $conn */
$totalProperties = mysqli_num_rows(
mysqli_query(
$conn,
"SELECT id FROM properties"
)
);

$totalProjects = mysqli_num_rows(
mysqli_query(
$conn,
"SELECT id FROM projects"
)
);

$totalBlogs = 0;

if(mysqli_query($conn,"SHOW TABLES LIKE 'blogs'")){
    $blogCheck = mysqli_query($conn,"SHOW TABLES LIKE 'blogs'");
    if(mysqli_num_rows($blogCheck) > 0){
        $totalBlogs = mysqli_num_rows(
        mysqli_query(
        $conn,
        "SELECT id FROM blogs"
        )
        );
    }
}

$totalMessages = mysqli_num_rows(
mysqli_query(
$conn,
"SELECT id FROM contact_messages"
)
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Dream World Admin Dashboard</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f5f5f5;
}

/* Sidebar */

.sidebar{
    width:260px;
    height:100vh;
    background:linear-gradient(180deg,#111827,#1f2937);
    position:fixed;
    left:0;
    top:0;
    overflow-y:auto;
}

.sidebar h2{
    color:#d4a017;
    text-align:center;
    padding:25px 15px;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:16px 25px;
    transition:0.3s;
    font-size:15px;
}

.sidebar a:hover{
    background:#d4a017;
    padding-left:35px;
}

/* Main Content */

.main{
    margin-left:260px;
    padding:30px;
}

/* Welcome Card */

.card{
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.card h1{
    color:#111827;
    margin-bottom:10px;
}

.card p{
    color:#666;
}

/* Stats Cards */

.stats{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-top:30px;
}

.stat-box{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.stat-box h3{
    color:#d4a017;
    margin-bottom:10px;
}

.stat-box h2{
    color:#111827;
}

/* Responsive */

@media(max-width:768px){

    .sidebar{
        width:100%;
        height:auto;
        position:relative;
    }

    .main{
        margin-left:0;
    }

    .stats{
        grid-template-columns:1fr;
    }
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

    <h2>Dream World</h2>

    <a href="dashboard.php">🏠 Dashboard</a>

    <a href="add-property.php">➕ Add Property</a>

    <a href="manage-properties.php">🏡 Manage Properties</a>

   
<a href="add-project.php">📂 Add Project</a>

<a href="manage-projects.php">📋 Manage Projects</a>
<a href="add-team.php" class="admin-card">
    👥 Add Team Member
</a>

<a href="manage-team.php" class="admin-card">
    🧑‍💼 Manage Team
</a>
   
<a href="add-blog.php">📝 Add Blog</a>

<a href="manage-blogs.php">📚 Manage Blogs</a>
<li>
    <a href="add-slider.php">
        🎞 Add Slider
    </a>
</li>

<li>
    <a href="manage-slider.php">
        🖼 Manage Slider
    </a>
</li>
    <a href="manage-messages.php">📩 Contact Messages</a>

 

    <a href="logout.php">🚪 Logout</a>

</div>

<!-- Main Content -->

<div class="main">

    <div class="card">

        <h1>Welcome Admin 👋</h1>

        <p>
            Manage properties, projects, blog posts and customer inquiries
            from your Dream World Real Estate Admin Panel.
        </p>

    </div>

    <div class="stats">

     <div class="stat-box">
    <h3>Total Properties</h3>
    <h2><?php echo $totalProperties; ?></h2>
</div>

<div class="stat-box">
    <h3>Total Projects</h3>
    <h2><?php echo $totalProjects; ?></h2>
</div>

<div class="stat-box">
    <h3>Blog Posts</h3>
    <h2><?php echo $totalBlogs; ?></h2>
</div>

<div class="stat-box">
    <h3>Messages</h3>
    <h2><?php echo $totalMessages; ?></h2>
</div>

    </div>

</div>

</body>
</html>