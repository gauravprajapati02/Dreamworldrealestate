
<?php

include '../includes/database.php';
/** @var mysqli $conn */

$query = mysqli_query(
    $conn,
    "SELECT * FROM properties
     WHERE page_type='Resell Plots'
     ORDER BY id DESC"
);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <!-- SEO -->

    <title>
        Own Sites | Dream World Real Estate
    </title>

    <meta name="description"
        content="Explore premium own sites and residential plots by Dream World Real Estate with smart investment opportunities.">

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
        href="../assets/css/style.css">

    <link rel="stylesheet"
        href="../assets/css/responsive.css">

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
                        <a class="nav-link active"
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
                        <a class="nav-link contact-btn"
                            href="contact.php">
                            Contact Us
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
                            Premium Own Sites
                        </h1>

                        <p>
                            Explore verified residential plots
                            and luxury township investment
                            opportunities.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= PROPERTY SECTION ================= -->

    <section class="section-padding bg-light-custom">

        <div class="container">

            <!-- Section Title -->

            <div class="section-title"
                data-aos="fade-up">

                <span>
                    FEATURED PROPERTIES
                </span>

                <h2>
                    Our Premium Own Sites
                </h2>

            </div>

            <div class="row g-4">

               <?php while($row = mysqli_fetch_assoc($query)){ ?>

                    <div class="col-lg-4 col-md-6"
                        data-aos="fade-up">

                        <div class="property-card">

                            <div class="image-hover">

                                <img src="../<?php echo $row['image']; ?>"
                                    class="img-fluid"
                                    alt="<?php echo $row['title']; ?>">

                            </div>

                            <div class="property-content">

    <h4>
        <?php echo $row['title']; ?>
    </h4>

    <p>
        <?php echo substr($row['description'],0,80); ?>...
    </p>

    <div class="property-info">

        <span>
            <i class="fas fa-map-marker-alt"></i>
            <?php echo $row['location']; ?>
        </span>

        <span>
            <?php echo $row['price']; ?>
        </span>

    </div>

    <a href="../property-details.php?id=<?php echo $row['id']; ?>"
        class="property-btn">

        View Details

    </a>

</div>

                        </div>

                    </div>

                    <?php
                }

                ?>
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