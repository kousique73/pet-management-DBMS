<?php

// Database connection
$host = 'localhost'; // Your database host
$dbname = 'petbondhu'; // Your actual database name
$username = 'root'; // Your database username (default is 'root' for XAMPP)
$password = ''; // Your database password (default is empty for XAMPP)

$connect = mysqli_connect($host, $username, $password, $dbname);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php"); // Redirect to login if not logged in
    exit();
}



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $animal_type = mysqli_real_escape_string($connect, $_POST['animal_type']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);
    
    // Insert into database (create adoption_requests table first)
    $query = "INSERT INTO adoption_requests 
             (name, email, phone, address, animal_type, message, request_date)
             VALUES ('$name', '$email', '$phone', '$address', '$animal_type', '$message', NOW())";
    
    if (mysqli_query($connect, $query)) {
        echo "<script>
            alert('Thank you very much. We will reach out to you soon!');
            window.location.href = '../adoption_sec/adoption.php';
        </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('../image/adoption_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
        }
        .form-container {
            background: rgba(0,0,0,0.7);
            border-radius: 15px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            margin-top: 5rem;
        }
        .form-group label {
            color: #ffffff; /* Ensure labels are fully white */
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-control {
            background: rgba(255,255,255,0.1); /* Lighter background for better contrast */
            border: 1px solid rgba(255,255,255,0.3);
            color: #ffffff; /* Ensure input text is fully white */
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.2); /* Slightly brighter on focus */
            border-color: #ff7f50; /* Orange accent color */
            box-shadow: 0 0 0 2px rgba(255, 127, 80, 0.3);
        }
        .btn-custom {
            background: linear-gradient(135deg, #ff7f50, #ff6347);
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 form-container">
                <h2 class="text-center mb-4" style="color: #ff7f50;">
                    Adoption Application Form
                </h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="animal_type">Animal Type</label>
                        <select class="form-control" id="animal_type" name="animal_type" required>
                            <option value="">Select Animal</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Bird">Bird</option>
                            <option value="Fish">Fish</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Additional Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-custom btn-block mt-4">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>