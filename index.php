<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Malcolm Photography</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">                   
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <div class="nav-section">
        <div class="brand-and-navBtn">
            <span class="brand-name">
                MALCOLM PHOTOGRAPHY
            </span>
            <span class="navBtn flex">    
                <i class="fas fa-bars"></i>
            </span>
        </div>

        <!-- Navigation menu -->
        <nav class="top-nav">
            <ul>
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="index.html" class="active">Home</a></li>';
                    echo '<li><a href="#">Welcome, ' . $_SESSION['username'] . '</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.html">Login</a></li>';
                }
                ?>
                <li><a href="login.html">Login</a></li>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="gallery1.html">Gallery</a></li>
                <li><a href="packages.html">Packages</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <span class="search-icon">
            <i class="fas fa-search"></i>
        </span>
    </div>

    
    <div class="social_icons">
        <ul>
            <li>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </li>
        </ul>
    </div>
</header>

<div class="container about">
    <div class="about-content">
        <div class="about-img flex">
            <img src="assets/img/1.jpg" alt="photographer img">
        </div>
        <h2>MALCOLM LISMORE</h2>
        <h3>Photographer</h3>
        <blockquote>
            Welcome to Malcolm Lismore Photography, where every click captures a moment and every frame tells a story. Dive into our curated collection of stunning photographs and join a vibrant community of photography enthusiasts. Whether you're here to admire, learn, or connect, let's explore the magic of photography together. Welcome to our world of visual storytelling.
        </blockquote>
    </div>
    <div class="banner">
        <img id="bannerImage" src="assets/img/b1.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b2.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b3.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b4.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b5.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b6.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b7.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b8.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b9.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b10.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b11.jpg" alt="Banner Image">
        <img id="bannerImage" src="assets/img/b12.jpg" alt="Banner Image">

    </div>

    <br>
    
    <video autoplay muted>
        <source src="assets\img\3571264-hd_1280_720_30fps.mp4" type="video/mp4">
      </video>
      
      

<footer class="footer">
    <div class="footer-container container">
        <div>
            <h2>MALCOLM LISMORE </h2>
            <p>"Through my lens, I capture the timeless beauty of Scotland's rugged landscapes and the enchanting moments of life." - Malcolm Lismore</p>
        </div>
        <div>
            <h3>Free Subscription!</h3>
            <p>"Explore Scotland's Wild Beauty: Meet Malcolm Lismore, Nature Photographer"</p>

            <div class="subs">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" placeholder="Email Address">
                <button type="submit">SUBSCRIBE</button>
            </div>
        </div>
    </div>
    <p>&copy; Copyright 2024© Lahiru Sathkumara. All rights reserved.</p>
</footer>

<script src="script.js"></script>
</script>
</body>
</html>
