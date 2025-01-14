<?php require_once("config.php"); $id=$_GET['id'];?>


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
                <li><a href="index.html">Home</a></li>
                <li><a href="gallery1.html" class="active">Gallery</a></li>
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
        <h3>Gallery Page</h3>
        <blockquote>
        Image Upload        
    </blockquote>
    </div>

    <nav class="navigation">
        <ul>
            <li><a href="gallery1.html">Page 1</a></li>
            <li><a href="gallery2.html">Page 2</a></li>
            <li><a href="gallery3.html">Page 3</a></li>
            <li><a href="gallery4.html">Page 4</a></li>
            <li><a href="gallery5.html">Page 5</a></li>
            <li><a href="upload.php"class="active">Upload Images</a></li>

        </ul>
    </nav>

<!-- main -->

<?php
require_once("config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT image FROM gallery WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $imageFileName = $row['image'];

    $imageFilePath = "uploads/" . $imageFileName;
    if(file_exists($imageFilePath)) {
        unlink($imageFilePath); 
    }

    $deleteQuery = "DELETE FROM gallery WHERE id = $id";
    $deleteResult = mysqli_query($db, $deleteQuery);

    if($deleteResult) {
        echo "<script>alert('Image deleted successfully!');
        window.location.href = 'upload.php';</script>";
    } else {
        echo "<script>alert('Error deleting image.');</script>";
    }
} else {
    echo "<script>alert('Image ID not provided.');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Image Title</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">                   
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container upload-form">
    <h2>Delete Image</h2>
    <form action="" method="POST" class="form">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $row['title']; ?>">
        </div>
        <button type="submit" name="form_submit" class="btn-primary">Update Title</button>
    </form>
</div>

</body>
</html>
