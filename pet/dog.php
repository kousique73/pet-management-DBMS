<?php
include 'dog_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dog Adoption</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../image/dog.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #ffffff;
            min-height: 100vh;
        }

        .container {
            padding: 2rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .filter-card {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s ease;
        }

        .filter-card:hover {
            transform: translateY(-5px);
        }

        .input-field {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 5px 15px;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            background: rgba(0, 0, 0, 0.3);
            border-color: #ff7f50;
            box-shadow: 0 0 0 2px rgba(255, 127, 80, 0.3);
        }

        .btn-custom {
            background: linear-gradient(135deg, #ff7f50, #ff6347);
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 500;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 127, 80, 0.4);
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 127, 80, 0.6);
        }

        .dog-card {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .dog-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .dog-card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: #ff7f50;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.8);
        }

        .adopt-btn {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: transform 0.3s ease;
        }

        .adopt-btn:hover {
            transform: scale(1.05);
        }

        .back-link {
            display: block;
            margin-top: 2rem;
            text-align: right;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #ff7f50;
        }
        footer {
            background: rgba(0, 0, 0, 0.5);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ff7f50;
        }

        @media (max-width: 768px) {
            .filter-card {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="filter-card">
                    <h2 class="text-center mb-4" style="color: #ff7f50;">Filter Dogs</h2>
                    <form method="GET" action="" class="filter-form">
                        <div class="form-group">
                            <label for="filter_age" class="text-white">Age</label>
                            <select name="age" id="filter_age" class="form-control input-field">
                                <option value="">All Ages</option>
                                <option value="1">1 year</option>
                                <option value="2">2 years</option>
                                <option value="3">3 years</option>
                                <option value="4">4 years</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="filter_breed" class="text-white">Breed</label>
                            <select name="breed" id="filter_breed" class="form-control input-field">
                                <option value="">All Breeds</option>
                                <option value="Golden Retriever">Golden Retriever</option>
                                <option value="Labrador">Labrador</option>
                                <option value="Beagle">Beagle</option>
                                <option value="Bulldog">Bulldog</option>
                                <option value="Poodle">Poodle</option>
                                <option value="Dachshund">Dachshund</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-custom btn-block mt-3">Apply Filters</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                
                <h1 class="text-right mb-4" style="color: #ff7f50;">Available Dogs</h1>
                <div class="row">
                    <?php
                    $query = "SELECT * FROM dogs";
                    $conditions = [];

                    if (!empty($_GET['age'])) {
                        $ageFilter = intval($_GET['age']);
                        $conditions[] = "age = $ageFilter";
                    }

                    if (!empty($_GET['breed'])) {
                        $breedFilter = mysqli_real_escape_string($connect, $_GET['breed']);
                        $conditions[] = "breed = '$breedFilter'";
                    }

                    if (!empty($conditions)) {
                        $query .= " WHERE " . implode(" AND ", $conditions);
                    }

                    $result = mysqli_query($connect, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($dog = mysqli_fetch_assoc($result)) {
                            echo "
                            <div class='col-md-6 mb-4'>
                                <div class='dog-card'>
                                    <img src='{$dog['image_url']}' class='card-img-top' alt='{$dog['name']}'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>{$dog['name']}</h5>
                                        <p class='card-text'>
                                            <strong>Breed:</strong> {$dog['breed']}<br>
                                            <strong>Age:</strong> {$dog['age']} years<br>
                                            <strong>Health:</strong> {$dog['health_status']}
                                        </p>
                                        <a href='pet_adopt.php' class='btn adopt-btn btn-block'>Adopt Now</a>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p class='text-center w-100'>No dogs found matching the selected filters.</p>";
                    }
                    ?>
                </div>
            </div>
            
        </div>
        <a href="../adoption_sec/adoption.php" class="back-link">
                    <i class="fas fa-arrow-left"></i> Back to Adoption
                </a>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> Paw me. All rights reserved.</p>
            <p>
                <a href="../about_us.php">About Us</a> | 
                <a href="../contact.php">Contact Us</a>
            </p>
        </div>
    </footer>
</body>
</html>