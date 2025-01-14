<?php require_once("config.php");?>


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
if (isset($_POST['form_submit'])) {
    $title = $_POST['title'];
    $folder = 'uploads/';
    $image_file = $_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $path = $folder . $image_file;
    $target_file = $folder . basename($image_file);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    if (!in_array(strtolower($imageFileType), $allowed_extensions)) {
        $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
    }
    if ($_FILES['image']['size'] > 10485760) {
        $error[] = 'Sorry, your image is too large. Upload less than 10MB';
    }
    if (!isset($error)) {
        if (move_uploaded_file($file, $target_file)) {

            $result = mysqli_query($db, "INSERT INTO gallery(image,title) VALUES('$image_file','$title')");
            if ($result) {
                $image_success = 1;
                echo "<script>alert('Image Uploaded Successfully!');</script>";
            } else {
                echo 'Something went wrong';
            }
        } else {
            echo "Error uploading file.";
        }
    }
}
?>


<div class="container upload-form">
    <h2>Upload Images</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <button type="submit" name="form_submit" class="btn-primary">Upload</button>
    </form>
</div>

</div class="container_display">
<table>
    <tr>
        <th> Image </th>
        <th> Title </th>
    </tr>
    <?php
    $res=mysqli_query($db, "SELECT * FROM gallery ORDER BY id DESC");
    while($row=mysqli_fetch_array($res))
    {
        echo '<tr>
        <td><img src="uploads/' . $row['image'] . '" height="200"></td>
        <td>' . $row['title'] . '</td>
        <td>
            <a href="edit.php?id=' . $row['id'] . '"><button class="button">Edit</button></a>
            <a href="delete.php?id=' . $row['id'] . '" onClick="return confirm(\'Are you sure you want to delete this image?\')"><button class="button btn_del">Delete</button></a>
        </td>
    </tr>';
    
    }

?>
<!-- end of main -->
<script src="script.js"></script>
</script>
</body>
</html>
