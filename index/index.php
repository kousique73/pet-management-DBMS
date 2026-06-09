<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw me</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .hero-section {
            background-image: url('../image/dog-full-bg.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Dark overlay */
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding-top: 20vh; /* Vertical centering */
        }

        .hero-title {
            color: #fff;
            margin-bottom: 2rem;
        }

        .hero-subtitle {
            color: #f9f9f9;
            margin-bottom: 3rem;
        }

        .btn-warning {
            background-color: #ffd700 !important;
            border-color: #ffd700 !important;
            margin-right: 1rem;
        }

        .btn-warning:hover {
            background-color: #ffca2c !important;
        }

        @media (max-width: 768px) {
            .hero-content {
                padding-top: 15vh;
            }
        }
    </style>
</head>
<body>
    
<?php include '../header/header.php'; ?>

<!-- Hero Section -->
<header class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 hero-content">
                <h2 class="hero-title display-4 font-weight-bold">One stop solution for pet care.</h2>
                <h3 class="hero-subtitle">Adoption, supplies and health support.</h3>
                <p class="text-white mb-4">
                    "Paw me" aims to create a comprehensive environment to support both new and experienced pet owners, 
                    making pet adoption and care easier and more effective.
                </p>
                <div class="btn-spacing">
                    <a href="../shop/shop.php" class="btn btn-warning btn-lg text-dark">Shop Now</a>
                    <a href="../adoption_sec/adoption.php" class="btn btn-warning btn-lg text-dark">Adopt Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay"></div> <!-- Overlay for better readability -->
</header>

<!-- Footer -->
<footer class="text-center py-3" style="background-color: #FFD700;">
    <p class="mb-0">&copy; 2025 Paw me. All Rights Reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>