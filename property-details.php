<?php

include 'includes/database.php';

$id = (int)$_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM properties WHERE id='$id'"
);

$property = mysqli_fetch_assoc($query);

if(!$property){
    die("Property Not Found");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
<?php echo $property['title']; ?>
</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<!-- Favicon -->
    <link rel="icon" href="assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>

body{
    margin:0;
    background:#f5f5f5;
    font-family:'Poppins',sans-serif;
    overflow-x:hidden;
}

.property-container{
    width:90%;
    max-width:1200px;
    margin:40px auto;
}

.card{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

/* Slider */

.propertySwiper{
    width:100%;
}

.propertySwiper img{
    width:100%;
    height:600px;
    object-fit:cover;
}

.swiper-button-next,
.swiper-button-prev{
    color:#fff;
}

.swiper-pagination-bullet-active{
    background:#d4a017;
}

/* Content */

.content{
    padding:30px;
}

.title{
    font-size:38px;
    color:#111827;
    margin-bottom:10px;
}

.price{
    font-size:32px;
    color:#d4a017;
    font-weight:bold;
    margin-bottom:20px;
}

.info{
    margin-bottom:12px;
    font-size:18px;
}

.description{
    margin-top:25px;
    line-height:1.8;
    color:#444;
}

.buttons{
    margin-top:30px;
}

.btn{
    display:inline-block;
    padding:12px 25px;
    text-decoration:none;
    color:white;
    border-radius:8px;
    margin-right:10px;
    margin-bottom:10px;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
}

.whatsapp{
    background:#25D366;
}

.call{
    background:#111827;
}

.back{
    background:#d4a017;
}

@media(max-width:768px){

.title{
    font-size:26px;
}

.price{
    font-size:24px;
}

.propertySwiper img{
    height:300px;
}

}
@media(max-width:768px){

.property-container{
    width:95%;
    margin:20px auto;
}

.propertySwiper img{
    height:260px !important;
}

.content{
    padding:20px;
}

.title{
    font-size:28px;
}

.price{
    font-size:24px;
}

.info{
    font-size:16px;
}

.btn{
    width:100%;
    display:block;
    margin-bottom:10px;
    text-align:center;
}

}
</style>

</head>

<body>

<div class="property-container">

<div class="card">

<!-- Slider Start -->

<div class="swiper propertySwiper">

<div class="swiper-wrapper">

<!-- Main Image -->

<div class="swiper-slide">

<img
src="<?php echo $property['image']; ?>"
alt="<?php echo $property['title']; ?>">

</div>

<!-- Gallery Images -->

<?php

$gallery = mysqli_query(
    $conn,
    "SELECT * FROM property_images
     WHERE property_id='".$property['id']."'"
);

while($img = mysqli_fetch_assoc($gallery)){

?>

<div class="swiper-slide">

<img
src="<?php echo $img['image']; ?>"
alt="Gallery Image">

</div>

<?php } ?>

</div>

<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-pagination"></div>

</div>

<!-- Slider End -->

<div class="content">

<h1 class="title">
<?php echo $property['title']; ?>
</h1>

<div class="price">
₹ <?php echo $property['price']; ?>
</div>

<div class="info">
📍 <strong>Location:</strong>
<?php echo $property['location']; ?>
</div>

<div class="info">
🏡 <strong>Category:</strong>
<?php echo $property['category']; ?>
</div>

<div class="description">

    

<p>
<?php echo nl2br($property['description']); ?>
</p>

</div>

<div class="buttons">

<a
href="https://wa.me/917355988578?text=I'm Interested In <?php echo urlencode($property['title']); ?>"
target="_blank"
class="btn whatsapp">
WhatsApp Inquiry
</a>

<a
href="tel:+917355988578"
class="btn call">
Call Now
</a>

<a
href="index.php"
class="btn back">
Back To Home
</a>

</div>

</div>

</div>

</div>
<div style="clear:both;"></div>
<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

new Swiper(".propertySwiper",{

    loop:true,

    speed:1200,

    autoplay:{
        delay:3000,
        disableOnInteraction:false
    },

    pagination:{
        el:".swiper-pagination",
        clickable:true
    },

    navigation:{
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev"
    }

});

</script>

<script src="assets/js/main.js"></script>

</body>
</html>