<?php

include 'includes/database.php';

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    $sql = "INSERT INTO contact_messages
    (name,email,phone,subject,message)
    VALUES
    ('$name','$email','$phone','$subject','$message')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Message Sent Successfully');</script>";
    } else {
        die("SQL Error: " . mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <!-- Title -->

    <title>
        Contact Dream World Real Estate | Property Consultant Jhansi
    </title>

    <!-- SEO -->
<!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
    <meta name="description"
content="Contact Dream World Real Estate for property consultation, plots, villas, duplex houses, agriculture land and investment opportunities in Jhansi.">
    <!-- Google Font -->
<link rel="canonical" href="https://dreamworldrealestate.in/contact.php">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- AOS -->

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet"
        href="assets/css/style.css">

    <link rel="stylesheet"
        href="assets/css/responsive.css">

</head>

<body>

    <!-- ================= NAVBAR ================= -->

    
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">

        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand"
                href="index.php">

                <img src="assets/images/logo.png"
                    alt="Dream World Real Estate">

            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end"
                id="navbarContent">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link"
                            href="index.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="about.php">
                            About
                        </a>
                    </li>

                   <!-- ================= PRODUCTS DROPDOWN ================= -->

<li class="nav-item dropdown premium-nav-dropdown">

    <!-- Main Link -->

    <a class="nav-link premium-dropdown-toggle"
        href="#"
        role="button">

        Products

        <!-- SVG Arrow -->

        <svg xmlns="http://www.w3.org/2000/svg"
            width="14"
            height="14"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="dropdown-svg">

            <polyline points="6 9 12 15 18 9"></polyline>

        </svg>

    </a>

    <!-- Dropdown Menu -->

    <div class="premium-dropdown-menu">

        <!-- Own Sites -->

        <a href="pages/own-sites.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-city"></i>

            </div>

            <div>

                <h6>
                    Own Sites
                </h6>

                <span>
                    Premium residential projects
                </span>

            </div>

        </a>

        <!-- Resell -->

        <a href="pages/resell-plots.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-map"></i>

            </div>

            <div>

                <h6>
                    Resell Plots
                </h6>

                <span>
                    Verified resale properties
                </span>

            </div>

        </a>

        <!-- House -->

        <a href="pages/house-sell.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-home"></i>

            </div>

            <div>

                <h6>
                    House Sell
                </h6>

                <span>
                    Luxury homes & villas
                </span>

            </div>

        </a>

        <!-- Agriculture -->

        <a href="pages/agriculture-land.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-leaf"></i>

            </div>

            <div>

                <h6>
                    Agriculture Land
                </h6>

                <span>
                    Farming & investment lands
                </span>

            </div>

        </a>

        <!-- Flat -->

        <a href="pages/flat-duplex.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-building"></i>

            </div>

            <div>

                <h6>
                    Flat & Duplex
                </h6>

                <span>
                    Modern apartment lifestyle
                </span>

            </div>

        </a>

        <!-- Plots -->

        <a href="pages/plots.php"
            class="premium-dropdown-item">

            <div class="dropdown-icon">

                <i class="fas fa-vector-square"></i>

            </div>

            <div>

                <h6>
                    Plots
                </h6>

                <span>
                    Premium investment plots
                </span>

            </div>

        </a>

    </div>

</li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="team.php">
                            Team
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="projects.php">
                            Projects
                        </a>
                    </li>
<!-- Blog -->

<li class="nav-item">

    <a class="nav-link"
        href="blog.php">

        Blog

    </a>

</li>
                    <li class="nav-item">
  <a class="gold-btn contact-btn active-contact-btn"
    href="contact.php">

    <span>
        Contact Us
    </span>

</a>

</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- ================= PAGE BANNER ================= -->

    <section class="page-banner">

        <div class="page-banner-overlay"></div>

        <div class="page-shape one"></div>
        <div class="page-shape two"></div>

        <div class="container position-relative">

            <div class="row justify-content-center">

                <div class="col-lg-9 text-center">

                    <div class="page-banner-content"
                        data-aos="fade-up">

                        <span>
                            DREAM WORLD REAL ESTATE
                        </span>

                        <h1>
                            Contact Us
                        </h1>

                        <p>
                            Let's discuss your dream property
                            and premium investment opportunities.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= CONTACT SECTION ================= -->

    <section class="section-padding">

        <div class="container">

            <div class="row g-5">

                <!-- Left -->

                <div class="col-lg-5"
                    data-aos="fade-right">

                    <div class="contact-info-wrapper">

                        <!-- Card -->

                        <div class="contact-info-card">

                            <div class="contact-icon">

                                <i class="fas fa-map-marker-alt"></i>

                            </div>

                            <div>

                                <h4>
                                    Office Address
                                </h4>

                                <p>
                                    Tube Well Rd, in front of Mount Litera Zee School, Dildar Nagar, Khati Baba, Jhansi, Uttar Pradesh 284003
                                </p>

                            </div>

                        </div>

                        <!-- Card -->

                        <div class="contact-info-card">

                            <div class="contact-icon">

                                <i class="fas fa-phone-alt"></i>

                            </div>

                            <div>

                                <h4>
                                    Phone Number
                                </h4>

                                <p>
                                    +91 7355988578
                                </p>

                            </div>

                        </div>

                        <!-- Card -->

                        <div class="contact-info-card">

                            <div class="contact-icon">

                                <i class="fas fa-envelope"></i>

                            </div>

                            <div>

                                <h4>
                                    Email Address
                                </h4>

                                <p>
                                    dreamworldjhansi@gmail.com
                                </p>

                            </div>

                        </div>

                        <!-- WhatsApp -->

                        <a href="https://wa.me/917355988578"
                            target="_blank"
                            class="contact-whatsapp-btn">

                            <i class="fab fa-whatsapp"></i>

                            Chat On WhatsApp

                        </a>

                    </div>

                </div>

                <!-- Right -->

                <div class="col-lg-7"
                    data-aos="fade-left">

                    <div class="contact-form-wrapper">
<?php if(isset($success)){ ?>
<div class="alert alert-success mb-4">
    <?php echo $success; ?>
</div>
<?php } ?>
                        <form method="POST">

                            <div class="row">

                                <!-- Name -->

                                <div class="col-md-6">

                                    <div class="form-group">

                                       <input type="text"
name="name"
class="form-control"
placeholder="Full Name"
required>

                                    </div>

                                </div>

                                <!-- Phone -->

                                <div class="col-md-6">

                                    <div class="form-group">

                                       <input type="text"
name="phone"
class="form-control"
placeholder="Phone Number"
required>

                                    </div>

                                </div>

                                <!-- Email -->

                                <div class="col-md-6">

                                    <div class="form-group">

                                      <input type="email"
name="email"
class="form-control"
placeholder="Email Address"
required>
                                    </div>

                                </div>

                                <!-- Property -->

                                <div class="col-md-6">

                                    <div class="form-group">

                                    <select name="subject" class="form-control">

                                            <option>
                                                Select Property
                                            </option>

                                            <option>
                                                Own Sites
                                            </option>

                                            <option>
                                                Resell Plots
                                            </option>

                                            <option>
                                                House Sell
                                            </option>

                                            <option>
                                                Agriculture Land
                                            </option>

                                            <option>
                                                Flat & Duplex
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <!-- Message -->

                                <div class="col-12">

                                    <div class="form-group">

 <textarea
name="message"
rows="6"
class="form-control"
placeholder="Write Your Message"
required></textarea>
                                    </div>

                                </div>

                                <!-- Button -->

                                <div class="col-12">

                                    <button
type="submit"
name="send"
class="submit-btn">
Send Inquiry
</button>

                                      

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= GOOGLE MAP ================= -->

    <!-- ================= GOOGLE MAP ================= -->

<!-- ================= GOOGLE MAP ================= -->

<section class="map-section">

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.029525740241!2d78.5312859!3d25.437276399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397771f11b32b091%3A0x91220481fee7124a!2sDream%20World%20Real%20Estate!5e0!3m2!1sen!2sin!4v1780477749567!5m2!1sen!2sin"
        width="100%"
        height="500"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

</section>

    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS -->

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="assets/js/main.js"></script>
    <script>

        AOS.init({
            duration:1000,
            once:true
        });

    </script>
<?php include 'includes/footer.php'; ?>
</body>

</html>