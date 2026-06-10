<?php
// Include the database connection file
include 'fish_database.php';
include '../header/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Adoption</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../image/fish.jpg');
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

        .fish-card {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .fish-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .fish-card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .fish-card:hover img {
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
            <!-- Filter Section -->
            <div class="col-md-4 mb-4">
                <div class="filter-card">
                    <h2 class="text-center mb-4" style="color: #ff7f50;">Filter Fish by Species</h2>
                    <form method="GET" action="" class="filter-form">
                        <div class="form-group">
                            <label for="filter_fish_species" class="text-white">Select Species</label>
                            <select name="species_name" id="filter_fish_species" class="form-control input-field">
                                <option value="">All Species</option>
                                <option value="Amphiprioninae">Clownfish</option>
                                <option value="Carcharodon carcharias">Great White Shark</option>
                                <option value="Paracanthurus hepatus">Blue Tang</option>
                                <option value="Betta splendens">Betta Fish</option>
                                <option value="Carassius auratus">Goldfish</option>
                                <option value="Lophiiformes">Anglerfish</option>
                                <option value="Poecilia reticulata">Guppy</option>
                                <option value="Synchiropus splendidus">Mandarinfish</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-custom btn-block mt-3">Apply Filters</button>
                    </form>
                </div>
            </div>

            <!-- Fish Profiles Section -->
            <div class="col-md-8">
                <h1 class="text-right mb-4" style="color: #ff7f50;">Available Fish</h1>
                <div class="row">
                    <?php
                    // Build query
                    $query = "SELECT * FROM fishs";
                    if (!empty($_GET['species_name'])) {
                        $speciesFilter = mysqli_real_escape_string($connect, $_GET['species_name']);
                        $query .= " WHERE species_name = '$speciesFilter'";
                    }

                    $result = mysqli_query($connect, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($fish = mysqli_fetch_assoc($result)) {
                            echo "
                            <div class='col-md-6 mb-4'>
                                <div class='fish-card'>
                                    <img src='{$fish['image']}' class='card-img-top' alt='{$fish['name']}'>
                                    <div class='card-body text-center'>
                                        <h5 class='card-title'>{$fish['name']}</h5>
                                        <p class='card-text'>
                                            <strong>Species:</strong> {$fish['species_name']}<br>
                                            <strong>Diet:</strong> {$fish['diet']}<br>
                                            <strong>Size:</strong> {$fish['size']}
                                        </p>
                                        <a href='pet_adopt.php' class='btn adopt-btn'>Adopt Now</a>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p class='text-center w-100'>No fish found matching the selected filters.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Back Link -->
        <a href="../adoption_sec/adoption.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Adoption
        </a>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> Paw me. All rights reserved.</p>
            <p>
                <a href="../about.php">About Us</a> | 
                <a href="../contact.php">Contact Us</a>
            </p>
        </div>
    </footer>
</body>
</html>