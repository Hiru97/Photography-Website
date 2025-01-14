 <?php
        // Assuming your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "malcolm";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $subject = $conn->real_escape_string($_POST['subject']);
            $package_type = $conn->real_escape_string($_POST['package_type']);
            $location = $conn->real_escape_string($_POST['location']);
            $date_of_function = $conn->real_escape_string($_POST['date_of_function']);
            $other_details = $conn->real_escape_string($_POST['other_details']);
        
            $sql = "INSERT INTO booking (name, email, subject, package_type, location, date_of_function, other_details)
                    VALUES ('$name', '$email', '$subject', '$package_type', '$location', '$date_of_function', '$other_details')";
        
            if ($conn->query($sql) === TRUE) {

                echo '<script>alert("Booking Submitted Successful"); window.location.href = "contact.html";</script>';

            }
            
            else{
            
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        }
        ?>

     