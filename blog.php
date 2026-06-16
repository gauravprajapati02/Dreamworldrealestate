<?php

include 'includes/database.php';

$blogs = mysqli_query(
$conn,
"SELECT * FROM blogs ORDER BY id DESC"
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>

.blog-card{
    background:#fff !important;
    border-radius:20px !important;
    overflow:hidden !important;
    box-shadow:0 10px 25px rgba(0,0,0,.1) !important;
    height:100% !important;
}

.blog-image{
    width:100% !important;
    overflow:hidden !important;
}

.blog-image img{
    width:100% !important;
    height:250px !important;
    object-fit:cover !important;
    display:block !important;
}

.blog-content{
    padding:20px !important;
}

.blog-content h4{
    font-size:24px !important;
    font-weight:700 !important;
}

.blog-content p{
    color:#666 !important;
    line-height:1.7 !important;
}

.blog-meta{
    color:#d4a017 !important;
    margin-bottom:10px !important;
}

.blog-btn{
    color:#d4a017 !important;
    text-decoration:none !important;
    font-weight:600 !important;
}
/* Premium Hover Animation */

.blog-card{
    transition: all 0.4s ease;
    position: relative;
}

.blog-card:hover{
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.blog-image img{
    transition: transform 0.6s ease;
}

.blog-card:hover .blog-image img{
    transform: scale(1.08);
}

.blog-content h4{
    transition: color 0.3s ease;
}

.blog-card:hover h4{
    color: #d4a017;
}

.blog-btn{
    transition: all 0.3s ease;
}

.blog-btn:hover{
    letter-spacing: 1px;
}

.blog-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(
        90deg,
        #d4a017,
        #f5d76e
    );
    transform:scaleX(0);
    transform-origin:left;
    transition:.4s;
}

.blog-card:hover::before{
    transform:scaleX(1);
}
</style>
    <!-- Meta -->

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <!-- Title -->

    <title>
        Blog | Dream World Real Estate
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
<!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
    <meta name="description"
        content="Read the latest real estate news, investment tips, luxury property trends, and smart home insights from Dream World Real Estate.">

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

    <a class="nav-link active"
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
                            Real Estate Blog
                        </h1>

                        <p>
                            Latest real estate news, luxury property trends,
                            investment tips, and smart living ideas.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= BLOG SECTION ================= -->

    <!-- ================= BLOG SECTION ================= -->

<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="section-title text-center mb-5">

            <span>LATEST ARTICLES</span>

            <h2>Explore Real Estate Insights</h2>

            <p>
                Latest real estate news, luxury property trends,
                investment tips, and smart living ideas.
            </p>

        </div>

        <div class="row g-4">

            <?php while($row = mysqli_fetch_assoc($blogs)){ ?>

           <div class="col-lg-4 col-md-6"
     data-aos="fade-up"
     data-aos-duration="1000">

                <div class="blog-card h-100"
     data-aos="zoom-in">

                    <div class="blog-image">

                        <img
                        src="<?php echo $row['image']; ?>"
                        alt="<?php echo $row['title']; ?>">

                    </div>

                    <div class="blog-content">

                        <div class="blog-meta">

                            <i class="fas fa-calendar"></i>

                            <?php echo date(
                                "d M Y",
                                strtotime($row['created_at'])
                            ); ?>

                        </div>

                        <h4>

                            <?php echo $row['title']; ?>

                        </h4>

                        <p>

                            <?php echo substr(
                                strip_tags($row['content']),
                                0,
                                120
                            ); ?>...

                        </p>

                        <a
                        href="blog-details.php?id=<?php echo $row['id']; ?>"
                        class="blog-btn">

                            Read More

                        </a>

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
    duration:1200,
    once:true,
    offset:120,
    easing:'ease-in-out'
});

    </script>
<?php include 'includes/footer.php'; ?>
</body>

</html>