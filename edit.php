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
$id = $_GET['id'];

$query = "SELECT * FROM gallery WHERE id = $id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['form_submit'])) {
    $image = $_FILES['image'];
    $title = $_POST['title'];

    if ($image['size'] > 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "<script>alert('Sorry, file already exists.');</script>";
            $uploadOk = 0;
        }

        if ($image["size"] > 5000000) {
            echo "<script>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $updateQuery = "UPDATE gallery SET image = '$target_file', title = '$title' WHERE id = $id";
                $updateResult = mysqli_query($db, $updateQuery);

                if ($updateResult) {
                    $result = mysqli_query($db, $query);
                    $row = mysqli_fetch_assoc($result);
                    
                    echo "<script>alert('Image and title updated successfully!');
                    window.location.href = 'upload.php';</script>";
                } else {
                    echo "<script>alert('Error updating image and title.');</script>";
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    } else {
        $newTitle = $_POST['title'];

        $updateQuery = "UPDATE gallery SET title = '$newTitle' WHERE id = $id";
        $updateResult = mysqli_query($db, $updateQuery);

        if ($updateResult) {
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
            
            echo "<script>alert('Image title updated successfully!');
            window.location.href = 'upload.php';</script>";
        } else {
            echo "<script>alert('Error updating image title.');</script>";
        }
    }
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
    <h2>Edit Image Title</h2>
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



<div class="container upload-form">
    <h2>Upload Your Images</h2>
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

</body>
</html>
