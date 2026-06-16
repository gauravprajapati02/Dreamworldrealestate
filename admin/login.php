<?php

session_start();

include '../includes/database.php';
/** @var mysqli $conn */
if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admins
        WHERE username='$username'
        AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password";
    }
}

?>
<?php
if(isset($_GET['logout'])){
    echo '<div class="alert alert-success">
            Logged out successfully.
          </div>';
}
?>
<!DOCTYPE html>
<html>

<head>

<title>Dream World Admin Login</title>
<link rel="icon" type="image/png" href="/dream-world-real-estate/assets/images/logo.png">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Rubik',sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(
135deg,
#0f172a,
#1e293b
);
}

.login-box{

width:420px;
background:#fff;
padding:40px;
border-radius:20px;
box-shadow:0 20px 50px rgba(0,0,0,.2);

}

.login-box h1{

text-align:center;
margin-bottom:30px;
color:#d4a017;

}

.input-box{

margin-bottom:20px;

}

.input-box input{

width:100%;
padding:14px;
border:1px solid #ddd;
border-radius:10px;
font-size:16px;

}

.login-btn{

width:100%;
padding:14px;
border:none;
border-radius:10px;
background:#d4a017;
color:#fff;
font-size:16px;
cursor:pointer;
font-weight:600;

}

.login-btn:hover{

background:#b8870f;

}

.error{

background:#ffdddd;
color:red;
padding:10px;
margin-bottom:15px;
border-radius:8px;

}

</style>

</head>

<body>

<div class="login-box">

<h1>Admin Login</h1>

<?php
if(isset($error))
{
echo "<div class='error'>$error</div>";
}
?>

<form method="POST">

<div class="input-box">

<input
type="text"
name="username"
placeholder="Username"
required>

</div>

<div class="input-box">

<input
type="password"
name="password"
placeholder="Password"
required>

</div>

<button
type="submit"
name="login"
class="login-btn">

Login

</button>

</form>

</div>

</body>

</html>