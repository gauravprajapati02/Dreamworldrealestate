<?php

include 'includes/database.php';

$team = mysqli_query(
$conn,
"SELECT * FROM team ORDER BY id DESC"
);

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
        Our Team | Dream World Real Estate Jhansi
    </title>

    <!-- SEO -->
     <meta property="og:type" content="website">

<meta property="og:title"
content="Dream World Real Estate">

<meta property="og:description"
content="Premium Plots, Villas, Duplex Homes and Agriculture Land in Jhansi.">

<meta property="og:image"
content="https://dreamworldrealestate.in/assets/images/logo.png">

<meta property="og:url"
content="https://dreamworldrealestate.in">
<link rel="canonical" href="https://dreamworldrealestate.in/team.php">
<!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
    <meta name="description"
content="Meet the experienced real estate professionals behind Dream World Real Estate providing trusted property solutions in Jhansi.">
    <!-- Google Font -->

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
                        <a class="nav-link active"
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
                        <a class="gold-btn contact-btn"
    href="contact.php">

    <span>
        Contact Us
    </span>

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
                            Meet Our Team
                        </h1>

                        <p>
                            Experienced professionals helping clients
                            find luxury properties and smart investments.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

   <!-- ================= TEAM SECTION ================= -->

<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="section-title text-center"
            data-aos="fade-up">

            <span>PROFESSIONAL TEAM</span>

            <h2>Our Expert Team Members</h2>

        </div>

        <div class="row justify-content-center g-4">

            <?php while($member = mysqli_fetch_assoc($team)){ ?>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                data-aos="fade-up">

                <div class="team-card">

                    <div class="team-image">

                        <img src="<?php echo $member['image']; ?>"
                            alt="<?php echo htmlspecialchars($member['name']); ?>">

                        <div class="team-overlay">

                            <div class="team-social">

                                <?php if(!empty($member['facebook'])){ ?>
                                <a href="<?php echo $member['facebook']; ?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <?php } ?>

                                <?php if(!empty($member['instagram'])){ ?>
                                <a href="<?php echo $member['instagram']; ?>" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <?php } ?>

                                <?php if(!empty($member['linkedin'])){ ?>
                                <a href="<?php echo $member['linkedin']; ?>" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <?php } ?>

                            </div>

                        </div>

                    </div>

                    <div class="team-content">

                        <h4>
                            <?php echo htmlspecialchars($member['name']); ?>
                        </h4>

                        <p>
                            <?php echo htmlspecialchars($member['designation']); ?>
                        </p>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

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