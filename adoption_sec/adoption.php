<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Section</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../image/dog.jpg');
            background-size: cover;
            background-attachment: fixed;
            min-height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .content {
            position: relative;
            z-index: 1;
        }

        .category-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 2rem;
            margin: 1rem;
            transition: transform 0.3s ease;
            min-height: 200px;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .category-icon {
            font-size: 3rem;
            color: #FF6B6B;
            margin-bottom: 1rem;
        }

        .category-title {
            color: #2D3436;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .btn-adopt {
            background: #4CAF50;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            color: white;
            transition: background 0.3s ease;
        }

        .btn-adopt:hover {
            background: #45a049;
        }

        @media (max-width: 768px) {
            .category-card {
                margin: 1rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="content">
        <?php include '../header/header.php'; ?>

        <div class="container py-5">
            <h1 class="text-center text-white mb-5">Find Your New Best Friend</h1>
            
            <div class="row">
                <!-- Dog Category -->
                <div class="col-md-6 col-lg-3">
                    <div class="category-card text-center">
                        <i class="fas fa-dog category-icon"></i>
                        <h3 class="category-title">Dogs</h3>
                        <p>Find loyal companions waiting for their forever home</p>
                        <a href="../pet/dog.php" class="btn btn-adopt">View Dogs</a>
                    </div>
                </div>

                <!-- Cat Category -->
                <div class="col-md-6 col-lg-3">
                    <div class="category-card text-center">
                        <i class="fas fa-cat category-icon"></i>
                        <h3 class="category-title">Cats</h3>
                        <p>Discover playful felines looking for adoption</p>
                        <a href="../pet/cat.php" class="btn btn-adopt">View Cats</a>
                    </div>
                </div>

                <!-- Bird Category -->
                <div class="col-md-6 col-lg-3">
                    <div class="category-card text-center">
                        <i class="fas fa-dove category-icon"></i>
                        <h3 class="category-title">Birds</h3>
                        <p>Meet colorful feathered friends available for adoption</p>
                        <a href="../pet/bird.php" class="btn btn-adopt">View Birds</a>
                    </div>
                </div>

                <!-- Fish Category -->
                <div class="col-md-6 col-lg-3">
                    <div class="category-card text-center">
                        <i class="fas fa-fish category-icon"></i>
                        <h3 class="category-title">Fish</h3>
                        <p>Explore aquatic pets perfect for your home aquarium</p>
                        <a href="../pet/fish.php" class="btn btn-adopt">View Fish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>