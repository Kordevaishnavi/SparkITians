<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/hero1.png" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>🌟 Reliable Expertise: Our team consists of skilled professionals with years of experience to provide top-notch services you can trust. <br>
⏱️Timely Service: We value your time and ensure prompt responses and on-schedule completion of tasks. <br>
💰 Affordable Pricing: Enjoy quality services at pocket-friendly prices without compromising on standards. <br>
🛠️ All-in-One Solution: From repairs to renovations, we cover a wide range of services to meet your every need.
😊 Customer Satisfaction: Your happiness is our priority.
            <a href="shop.php" class="btn">book now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>what we provide?</h3>
            <p>Cleaning Services 🧹: Spotless spaces with deep cleaning and regular maintenance. <br>
Repair Services 🔧: Fixing appliances and furniture with expert precision. <br>
Plumbing Services 🚿: Quick solutions for leaks, clogs, and water system issues. <br>
Electrical Services ⚡: Safe installations, repairs, and maintenance. <br>
Salon Services 💇‍♀️💅: Beauty treatments at your doorstep for a luxurious pampering. <br>
Painting Services 🎨: Fresh coats and vibrant transformations for your walls. <br>
Shifting Services 🚛: Stress-free relocation with packing, moving, and unpacking. <br>
Carpentry Services 🪚: Custom furniture and quality repairs by skilled craftsmen.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/hero2.png" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images\hero3.png" alt="">
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>We are your one-stop solution for all home and lifestyle services! 🏠✨ From fixing leaky faucets 🔧 to creating dream interiors 🎨, pampering you with salon services 💇‍♀️, or ensuring a stress-free move 🚚—we’ve got it all covered.

With a team of skilled professionals 🤝 and a commitment to quality 💯, we deliver convenience, reliability, and top-notch service tailored to your needs. Let us simplify your life! 😊</p>
            <a href="#reviews" class="btn">clients reviews</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Their bread is always so fresh and full of flavor. I love the variety they offer, and it’s now a weekly ritual to pick up my favorites. Great quality every time!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>David L.</h3>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Absolutely the best pastries I've ever had! The croissants are flaky, buttery perfection, and the customer service is wonderful. Highly recommend!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sarah T.</h3>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>The pastries are amazing—flaky, fresh, and full of flavor! The cinnamon rolls are amazing! Soft, gooey, and just the right amount of sweetness. I can’t resist stopping by every time I’m nearby.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mark A.</h3>
        </div>

        <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>Love this bakery! Their attention to detail and unique flavors keep me coming back. The customer service is always friendly and helpful too!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Jessica M.</h3>
        </div>

        <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>The atmosphere is warm and inviting, and the baked goods are unmatched. From bread to sweets, everything is top-notch. A true gem in town!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Ben C.</h3>
        </div>

        <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Friendly staff and delicious treats. The cinnamon rolls are a must. Love the variety and freshness. Perfect for every occasion. Beautifully crafted. Highly recommend!</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Rachel H.</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>