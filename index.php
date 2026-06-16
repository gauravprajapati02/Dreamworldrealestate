
<?php

include 'includes/database.php';

$latest = mysqli_query(
$conn,
"SELECT * FROM properties
WHERE featured='1'
ORDER BY id DESC
LIMIT 6"
);

?>


<?php

include 'includes/database.php';

$latest = mysqli_query(
    $conn,
    "SELECT * FROM properties
    WHERE featured='1'
    ORDER BY id DESC
    LIMIT 6"
);

?>
<?php
include 'includes/database.php';

$teamQuery = mysqli_query(
    $conn,
    "SELECT * FROM team
     WHERE home_show = 1
     ORDER BY id DESC"
);
?>
<?php

$homeProjects = mysqli_query(
    $conn,
    "SELECT * FROM projects
     WHERE home_show='1'
     ORDER BY id DESC
     LIMIT 3"
);

?>
<?php

$sliderQuery = mysqli_query(
    $conn,
    "SELECT * FROM hero_slides
    WHERE status=1
    ORDER BY id DESC"
);

$slider = mysqli_fetch_assoc($sliderQuery);

$heroImage = "assets/images/default-banner.jpg";

if($slider){
    $heroImage = $slider['image'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- SEO -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Dream World Real Estate | Premium Plots, Villas, Duplex & Agriculture Land in Jhansi
    </title>

    <meta name="description" content="Dream World Real Estate is a trusted real estate company in Jhansi offering premium plots, luxury villas, duplex homes, agriculture land and investment opportunities. Founded by Gyan Singh Prajapati with a commitment to transparency and customer satisfaction.">

<meta name="keywords" content="Dream World Real Estate, Real Estate Jhansi, Property Dealer Jhansi, Plots in Jhansi, Villas in Jhansi, Duplex House Jhansi, Agriculture Land Jhansi, Property Investment Jhansi, Gyan Singh Prajapati, Dream World Real Estate Jhansi">
<link rel="canonical" href="https://dreamworldrealestate.in/">
<meta name="author" content="Dream World Real Estate">
    <meta property="og:type" content="website">

<meta property="og:title" content="Dream World Real Estate">

<meta property="og:description" content="Premium plots, villas, duplex homes and agriculture land in Jhansi.">

<meta property="og:url" content="https://dreamworldrealestate.in">

<meta property="og:image" content="https://dreamworldrealestate.in/assets/images/logo.png">

    <!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet"
        href="assets/css/style.css">

    <link rel="stylesheet"
        href="assets/css/responsive.css">
<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"RealEstateAgent",
 "name":"Dream World Real Estate",
 "url":"https://dreamworldrealestate.in",
 "logo":"https://dreamworldrealestate.in/assets/images/logo.png",
 "description":"Premium plots, villas, duplex homes, agriculture land and real estate investment opportunities in Jhansi.",
 "founder":{
   "@type":"Person",
   "name":"Gyan Singh Prajapati"
 },
 "employee":{
   "@type":"Person",
   "name":"Pavan Prajapati"
 },
 "address":{
   "@type":"PostalAddress",
   "addressLocality":"Jhansi",
   "addressRegion":"Uttar Pradesh",
   "addressCountry":"IN"
 },
 "telephone":"+91-7355988578"
}
</script>
</head>

<body>
<!-- ================= SCROLL PROGRESS ================= -->

<div class="scroll-progress-container">

    <div class="scroll-progress-bar"
        id="scrollBar"></div>

</div>
    <!-- ================= PRELOADER ================= -->

 <!-- ================= PREMIUM LOADER ================= -->

<div id="preloader">

    <div class="loader-wrapper">

        <!-- Logo -->

        <img src="assets/images/logo.png"
            alt="Dream World Real Estate"
            class="loader-logo">

        <!-- Loader Line -->

        <div class="loader-line">

            <span></span>

        </div>

        <!-- Text -->

        <h3>
            Dream World Real Estate
        </h3>

        <p>
            Luxury Living & Smart Investments
        </p>

    </div>

</div>

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

<li class="nav-item premium-nav-dropdown">

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
<?php

$sliderQuery = mysqli_query(
    $conn,
    "SELECT * FROM hero_slides
    WHERE status=1
    ORDER BY id DESC"
);

if(!$sliderQuery){
    die("Slider Query Error: " . mysqli_error($conn));
}

?>
   <!-- ================= HERO SECTION ================= -->

<section class="hero-slider">

<?php while($slider = mysqli_fetch_assoc($sliderQuery)){ ?>

<div class="hero-slide"
style="
background-image:url('<?php echo $slider['image']; ?>');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
">

<div class="hero-overlay"></div>

<div class="container">

<div class="row align-items-center min-vh-100">

<div class="col-lg-7">

<div class="hero-content">

<span class="hero-tag">
Premium Real Estate Solutions
</span>

<h1 class="hero-title">
<?php echo $slider['title']; ?>
</h1>

<p class="hero-description">
<?php echo $slider['subtitle']; ?>
</p>

<div class="hero-buttons">

<a href="#categories" class="gold-btn">
Explore Properties
</a>

<a href="contact.php" class="white-btn">
Contact Us
</a>

</div>

</div>

</div>

</div>

</div>

</div>

<?php } ?>

</section>
    <!-- ================= PROPERTY CATEGORIES ================= -->

    <section class="section-padding"
        id="categories">

        <div class="container">

            <div class="section-title"
                data-aos="fade-up">

                <span>OUR SERVICES</span>

                <h2>
                    Explore Property Categories
                </h2>

                <p>
                    Discover premium real estate properties
                    tailored for investment and modern living.
                </p>

            </div>

            <div class="row g-4 justify-content-center">

<?php while($row = mysqli_fetch_assoc($latest)){ ?>

<div class="col-lg-4 col-md-6"
data-aos="fade-up">

<div class="property-card">

<div class="property-image">

<img
src="<?php echo $row['image']; ?>"
class="img-fluid"
alt="<?php echo $row['title']; ?>">

</div>

<div class="property-content">

<span class="property-price">

<?php echo $row['price']; ?>

</span>

<h4>

<?php echo $row['title']; ?>

</h4>

<p>

📍 <?php echo $row['location']; ?>

</p>

<a
href="property-details.php?id=<?php echo $row['id']; ?>"
class="gold-btn">

View Details

</a>

</div>

</div>

</div>

<?php } ?>

</div>

        </div>

    </section>

    <!-- ================= FEATURED PROPERTIES ================= -->

    <!--- <section class="section-padding bg-light-custom">

        <div class="container">

            <div class="section-title"
                data-aos="fade-up">

                <span>FEATURED PROPERTIES</span>

                <h2>
                    Luxury Properties Collection
                </h2>

                <p>
                    Explore our handpicked premium real estate properties.
                </p>

            </div>

            <div class="row g-4 justify-content-center"---

                <-- Property -->
                <!--- <div class="col-lg-4"
                    data-aos="fade-up">

                    <div class="property-card">

                        <div class="image-hover">

                            <img src="assets/images/property1.jpg"
                                class="img-fluid"
                                alt="Luxury Villa">

                        </div>

                        <div class="property-content">

                            <span class="property-price">
                                ₹45 Lakh
                            </span>

                            <h4>
                                Luxury Duplex Villa
                            </h4>

                            <p>
                                Premium duplex villa with luxury architecture.
                            </p>

                            <a href="#"
                                class="gold-btn">
                                View Details
                            </a>

                        </div>

                    </div>

                </div>

                <-- Property -->
                <!--<div class="col-lg-4"
                    data-aos="fade-up"
                    data-aos-delay="100">

                    <div class="property-card">

                        <div class="image-hover">

                            <img src="assets/images/property2.jpg"
                                class="img-fluid"
                                alt="Premium Plot">

                        </div>

                        <div class="property-content">

                            <span class="property-price">
                                ₹22 Lakh
                            </span>

                            <h4>
                                Premium Residential Plot
                            </h4>

                            <p>
                                Prime location plots with investment opportunities.
                            </p>

                            <a href="#"
                                class="gold-btn">
                                View Details
                            </a>

                        </div>

                    </div>

                </div>

                <-- Property -->
                <!-- <div class="col-lg-4"
                    data-aos="fade-up"
                    data-aos-delay="200">

                    <div class="property-card">

                        <div class="image-hover">

                            <img src="assets/images/property3.jpg"
                                class="img-fluid"
                                alt="Modern Apartment">

                        </div>

                        <div class="property-content">

                            <span class="property-price">
                                ₹60 Lakh
                            </span>

                            <h4>
                                Modern Luxury Apartment
                            </h4>

                            <p>
                                Elegant apartment with premium lifestyle amenities.
                            </p>

                            <a href="#"
                                class="gold-btn">
                                View Details
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section> 
<-- ================= ABOUT SECTION ================= -->

<section class="section-padding about-section">

    <div class="container">

        <div class="row align-items-center">

            <!-- Left Images -->

            <div class="col-lg-6"
                data-aos="fade-right">

                <div class="about-image-wrapper">

                    <img src="assets/images/about.jpg"
                        class="img-fluid main-about-image"
                        alt="Dream World Real Estate">

                    <!-- Floating Card -->

                    <div class="experience-card">

                        <h3>10+</h3>

                        <p>
                            Years Experience
                        </p>

                    </div>

                </div>

            </div>

            <!-- Right Content -->

            <div class="col-lg-6 mt-5 mt-lg-0"
                data-aos="fade-left">

                <div class="section-title text-start">

                    <span>ABOUT COMPANY</span>

                    <h2>
                        Trusted Real Estate Solutions For Modern Living
                    </h2>

                </div>

                <p class="about-text">

                    Dream World Real Estate provides premium plots,
                    duplexes, agriculture land, and luxury homes
                    with complete trust and transparency.

                </p>

                <p class="about-text">

                    We focus on premium property investments,
                    customer satisfaction, modern infrastructure,
                    and secure real estate solutions.

                </p>

                <!-- Features -->

                <div class="about-features">

                    <div class="feature-item">

                        <div class="feature-icon">
                            ✔
                        </div>

                        <span>
                            Verified Properties
                        </span>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">
                            ✔
                        </div>

                        <span>
                            Trusted Investment
                        </span>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">
                            ✔
                        </div>

                        <span>
                            Luxury Living Experience
                        </span>

                    </div>

                    <div class="feature-item">

                        <div class="feature-icon">
                            ✔
                        </div>

                        <span>
                            Prime Locations
                        </span>

                    </div>

                </div>

                <a href="about.php"
                    class="gold-btn mt-4">

                    Read More

                </a>

            </div>

        </div>

    </div>

</section>
<!-- ================= STATISTICS SECTION ================= -->

<section class="stats-section">

    <div class="container">

        <div class="row g-4 justify-content-center">

            <!-- Stat -->

            <div class="col-lg-3 col-md-6"
                data-aos="zoom-in">

                <div class="stat-card">

                    <div class="stat-icon">
                        🏘
                    </div>

                    <h2 class="counter"
                        data-target="500">
                        0
                    </h2>

                    <p>
                        Properties Sold
                    </p>

                </div>

            </div>

            <!-- Stat -->

            <div class="col-lg-3 col-md-6"
                data-aos="zoom-in"
                data-aos-delay="100">

                <div class="stat-card">

                    <div class="stat-icon">
                        😊
                    </div>

                    <h2 class="counter"
                        data-target="250">
                        0
                    </h2>

                    <p>
                        Happy Clients
                    </p>

                </div>

            </div>

            <!-- Stat -->

            <div class="col-lg-3 col-md-6"
                data-aos="zoom-in"
                data-aos-delay="200">

                <div class="stat-card">

                    <div class="stat-icon">
                        🏗
                    </div>

                    <h2 class="counter"
                        data-target="15">
                        0
                    </h2>

                    <p>
                        Upcoming Projects
                    </p>

                </div>

            </div>

            <!-- Stat -->

            <div class="col-lg-3 col-md-6"
                data-aos="zoom-in"
                data-aos-delay="300">

                <div class="stat-card">

                    <div class="stat-icon">
                        ⭐
                    </div>

                    <h2 class="counter"
                        data-target="10">
                        0
                    </h2>

                    <p>
                        Years Experience
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ================= TEAM SECTION ================= -->

<section class="team-section section-padding">

    <div class="container">

        <div class="section-title text-center mb-5">

            <span>OUR TEAM</span>

            <h2>Meet Our Expert Team</h2>

        </div>

        <div class="row g-4 justify-content-center">

            <?php while($row = mysqli_fetch_assoc($teamQuery)){ ?>

            <div class="col-lg-4 col-md-6">

                <div class="team-card">

                    <div class="team-image">

                        <img src="<?php echo $row['image']; ?>"
                             alt="<?php echo $row['name']; ?>">

                    </div>

                    <div class="team-content">

                        <h4>
                            <?php echo $row['name']; ?>
                        </h4>

                        <p>
                            <?php echo $row['designation']; ?>
                        </p>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>

<!-- ================= UPCOMING PROJECTS ================= -->
<section class="section-padding projects-section bg-light-custom">

    <div class="container">

        <div class="section-title"
            data-aos="fade-up">

            <span>UPCOMING PROJECTS</span>

            <h2>
                Discover Our Latest Projects
            </h2>

            <p>
                Explore premium upcoming real estate developments
                designed for modern lifestyle and investment.
            </p>

        </div>


            <div class="row g-4">

<?php while($row = mysqli_fetch_assoc($homeProjects)){ ?>

<div class="col-lg-4 col-md-6">

    <div class="project-card">

        <div class="project-image">

    <span class="project-badge">
        <?php echo $row['status']; ?>
    </span>

    <img src="<?php echo $row['image']; ?>"
         alt="<?php echo $row['title']; ?>">

</div>

        <div class="project-content">

            <h4>
                <?php echo $row['title']; ?>
            </h4>

            <p>
                <?php echo $row['description']; ?>
            </p>

            <div class="progress mb-3">

                <div class="progress-bar"
                     style="width:<?php echo $row['progress']; ?>%">
                </div>

            </div>

            <strong>
                Progress :
                <?php echo $row['progress']; ?>%
            </strong>

            <p class="mt-2">
                <i class="fas fa-map-marker-alt"></i>
                <?php echo $row['location']; ?>
            </p>

        </div>

    </div>

</div>

<?php } ?>

</div>
        </div>

    </div>

</section><!-- ================= TESTIMONIALS SECTION ================= -->

<section class="section-padding testimonials-section">

    <div class="container">

        <div class="section-title"
            data-aos="fade-up">

            <span>CLIENT TESTIMONIALS</span>

            <h2>
                What Our Clients Say
            </h2>

            <p>
                Trusted by families and investors for premium
                real estate services and transparent dealings.
            </p>

        </div>

        <div class="row g-4 justify-content-center">

            <!-- Testimonial -->

            <div class="col-lg-4 col-md-6"
                data-aos="fade-up">

                <div class="testimonial-card">

                    <div class="testimonial-top">

                        <img src="assets/images/client1.jpg"
                            alt="Client">

                        <div>

                            <h4>
                                Amit Sharma
                            </h4>

                            <span>
                                Property Investor
                            </span>

                        </div>

                    </div>

                    <p>
                        Dream World Real Estate provided excellent
                        service and helped me find the perfect investment plot.
                        Highly professional team and transparent process.
                    </p>

                    <div class="testimonial-rating">

                        ⭐⭐⭐⭐⭐

                    </div>

                </div>

            </div>

            <!-- Testimonial -->

            <div class="col-lg-4 col-md-6"
                data-aos="fade-up"
                data-aos-delay="100">

                <div class="testimonial-card">

                    <div class="testimonial-top">

                        <img src="assets/images/client2.jpg"
                            alt="Client">

                        <div>

                            <h4>
                                Priya Verma
                            </h4>

                            <span>
                                Home Buyer
                            </span>

                        </div>

                    </div>

                    <p>
                        Very trusted real estate company with
                        premium property options and excellent support.
                        The buying experience was smooth and secure.
                    </p>

                    <div class="testimonial-rating">

                        ⭐⭐⭐⭐⭐

                    </div>

                </div>

            </div>

            <!-- Testimonial -->

            <div class="col-lg-4 col-md-6"
                data-aos="fade-up"
                data-aos-delay="200">

                <div class="testimonial-card">

                    <div class="testimonial-top">

                        <img src="assets/images/client3.jpg"
                            alt="Client">

                        <div>

                            <h4>
                                Rahul Singh
                            </h4>

                            <span>
                                Business Owner
                            </span>

                        </div>

                    </div>

                    <p>
                        Amazing customer support and premium
                        project quality. I highly recommend
                        Dream World Real Estate for property investment.
                    </p>

                    <div class="testimonial-rating">

                        ⭐⭐⭐⭐⭐

                    </div>

                </div>

            </div>

        </div>

        <!-- Google Reviews Button -->

        <div class="google-review-btn text-center"
            data-aos="zoom-in">

            <a href="https://share.google/iEhA40OH989klRze7"
                target="_blank"
                class="review-btn">

                ⭐ View Google Reviews

            </a>

        </div>


</section>
<!-- ================= CONTACT SECTION ================= -->

<section class="section-padding contact-section">

    <div class="container">

        <div class="section-title"
            data-aos="fade-up">

            <span>CONTACT US</span>

            <h2>
                Let's Discuss Your Dream Property
            </h2>

            <p>
                Contact Dream World Real Estate for premium plots,
                luxury homes, duplexes, agriculture land,
                and investment opportunities.
            </p>

        </div>

        <div class="row g-5 align-items-center">

            <!-- Left Info -->

            <div class="col-lg-5"
                data-aos="fade-right">

                <div class="contact-info-wrapper">

                    <!-- Card -->

                    <div class="contact-info-card">

                        <div class="contact-icon">
                            📍
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
                            📞
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
                            ✉
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

                        💬 Chat On WhatsApp

                    </a>

                </div>

            </div>

            <!-- Right Form -->

            <div class="col-lg-7"
                data-aos="fade-left">

                <div class="contact-form-wrapper">

                    <form>

                        <div class="row">

                            <!-- Name -->

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="text"
                                        placeholder="Full Name"
                                        class="form-control">

                                </div>

                            </div>

                            <!-- Phone -->

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="text"
                                        placeholder="Phone Number"
                                        class="form-control">

                                </div>

                            </div>

                            <!-- Email -->

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input type="email"
                                        placeholder="Email Address"
                                        class="form-control">

                                </div>

                            </div>

                            <!-- Property Type -->

                            <div class="col-md-6">

                                <div class="form-group">

                                    <select class="form-control">

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

                                    <textarea rows="6"
                                        placeholder="Write Your Message"
                                        class="form-control"></textarea>

                                </div>

                            </div>

                            <!-- Button -->

                            <div class="col-12">

                                <button type="submit"
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

</section><!-- ================= CTA SECTION ================= -->

<section class="cta-section">

    <div class="container">

        <div class="cta-wrapper"
            data-aos="zoom-in">

            <div class="row align-items-center">

                <!-- Left -->

                <div class="col-lg-8">

                    <div class="cta-content">

                        <span>
                            LET'S BUILD YOUR FUTURE
                        </span>

                        <h2>
                            Find Your Dream Property With
                            Dream World Real Estate
                        </h2>

                        <p>
                            Premium plots, luxury homes,
                            duplexes, agriculture land,
                            and investment opportunities
                            at prime locations.
                        </p>

                    </div>

                </div>

                <!-- Right -->

                <div class="col-lg-4">

                    <div class="cta-buttons">

                        <a href="contact.php"
                            class="cta-btn">

                            Contact Us

                        </a>

                        <a href="https://wa.me/917355988578"
                            target="_blank"
                            class="cta-btn-outline">

                            WhatsApp

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <!-- JS -->
    <script src="assets/js/main.js"></script>

<script>

AOS.init({
    duration: 800,
    once: true,
    disable: window.innerWidth < 768
});

</script>
<!-- ================= WHATSAPP BUTTON ================= -->

<a href="https://wa.me/917355988578"
    class="whatsapp-btn"
    target="_blank">

    💬

</a>
<!-- ================= FOOTER SECTION ================= -->

<?php include 'includes/footer.php'; ?>
<!-- ================= CUSTOM CURSOR ================= -->

<div class="custom-cursor"></div>

<div class="custom-cursor-dot"></div>
<!-- ================= MOBILE BOTTOM MENU ================= -->

<div class="mobile-bottom-menu">

    <!-- Home -->

    <a href="index.php"
        class="mobile-menu-item active">

        <i class="fas fa-home"></i>

        <span>Home</span>

    </a>

    <!-- Properties -->

    <a href="#categories"
        class="mobile-menu-item">

        <i class="fas fa-building"></i>

        <span>Properties</span>

    </a>

    <!-- Projects -->

    <a href="projects.php"
        class="mobile-menu-item">

        <i class="fas fa-city"></i>

        <span>Projects</span>

    </a>

    <!-- Team -->

    <a href="team.php"
        class="mobile-menu-item">

        <i class="fas fa-users"></i>

        <span>Team</span>

    </a>

    <!-- Contact -->

    <a href="contact.php"
        class="mobile-menu-item">

        <i class="fas fa-phone-alt"></i>

        <span>Contact</span>

    </a>

</div>
<script>

document.addEventListener("DOMContentLoaded",function(){

    const slides =
    document.querySelectorAll(".hero-slide");

    if(slides.length===0) return;

    let current = 0;

    slides[current].classList.add("active");

    setInterval(function(){

        slides[current].classList.remove("active");

        current++;

        if(current >= slides.length){
            current = 0;
        }

        slides[current].classList.add("active");

    },6000);

});

</script>



</body>

</html>