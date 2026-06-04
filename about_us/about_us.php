<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Paw me</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #F8F9FA;
            --accent-color: #FF6B6B;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: var(--primary-color);
            bottom: 0;
            left: 0;
        }

        .about-image img {
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            max-width: 500px;
            width: 100%;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .mission-values {
            background: var(--secondary-color);
            border-radius: 10px;
            padding: 30px;
            margin: 30px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .mission-values h4 {
            color: var(--primary-color);
        }

        .mission-values ul {
            list-style: none;
            padding: 0;
        }

        .mission-values li {
            position: relative;
            padding-left: 30px;
            margin: 15px 0;
        }

        .mission-values li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            position: absolute;
            left: 0;
            color: var(--accent-color);
            font-weight: 900;
        }

        .sector-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .sector-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .sector-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .sector-card h5 {
            color: var(--primary-color);
            margin: 20px 0;
        }

        .sector-card p {
            color: #666;
        }

        .cta-btn {
            background: var(--primary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .cta-btn:hover {
            background: #5A51E6;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .about-image img {
                max-width: 100%;
            }
            
            .mission-values {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php include '../header/header.php'; ?>

    <!-- Hero Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="about-image">
                        <img src="../image/petlogo.jpeg" alt="Pets" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">About Us</h2>
                    <p class="lead">
                        At <strong>Paw me</strong>, we're passionate about creating a safe, loving community for pets and their owners. 
                        Our platform connects pet lovers with essential resources for adoption, shopping, and healthcare, all in one place.
                    </p>
                    <a href="#" class="btn cta-btn">Join Our Community</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mission-values">
                    <h4><i class="fas fa-paw mr-2"></i>Our Mission</h4>
                    <p>
                        To promote responsible pet ownership and ensure every animal finds a loving home. 
                        We provide comprehensive resources for adoption, pet care, and veterinary services.
                    </p>
                </div>
                <div class="col-md-6 mission-values">
                    <h4><i class="fas fa-heart mr-2"></i>Our Values</h4>
                    <ul>
                        <li>Compassionate care for all animals</li>
                        <li>Transparent and ethical practices</li>
                        <li>Commitment to quality service</li>
                        <li>Building a supportive community</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Animal Sectors -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Our Animal Friends</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="sector-card">
                        <img src="../image/dogadoption.jpeg" alt="Dog Adoption" class="sector-image">
                        <div class="card-body">
                            <h5>Dog Adoption</h5>
                            <p>Find your perfect canine companion and give a dog a loving home.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="sector-card">
                        <img src="../image/catadoption.jpeg" alt="Cat Care" class="sector-image">
                        <div class="card-body">
                            <h5>Cat Care</h5>
                            <p>Expert resources for feline health, behavior, and adoption.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="sector-card">
                        <img src="../image/aquaticlife.jpeg" alt="Aquatic Life" class="sector-image">
                        <div class="card-body">
                            <h5>Aquatic Life</h5>
                            <p>Everything you need to create a thriving aquatic environment.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="sector-card">
                        <img src="../image/birdadoption.jpeg" alt="Bird Sanctuary" class="sector-image">
                        <div class="card-body">
                            <h5>Bird Sanctuary</h5>
                            <p>Care guides and adoption resources for feathered friends.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="sector-card">
                        <img src="../image/smallpetadoption.jpeg" alt="Small Pets" class="sector-image">
                        <div class="card-body">
                            <h5>Small Pets</h5>
                            <p>Specialized care for rabbits, guinea pigs, and other small animals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>