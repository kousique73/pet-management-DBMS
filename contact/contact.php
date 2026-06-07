<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Paw me</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #F8F9FA;
            --accent-color: #FF6B6B;
            --dark-color: #2D3436;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-image: url('../image/contact.avif');
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            min-height: 100vh;
            margin: 0;
        }

        /* Overlay for better readability */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            z-index: -1;
        }

        .contact-section {
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header h2 {
            color: var(--dark-color);
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
        }

        .section-header p {
            color: #666;
            max-width: 600px;
            margin: 10px auto 0;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .contact-info-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .contact-info-item:hover {
            transform: translateY(-5px);
        }

        .contact-info-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .contact-info-content h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .contact-info-content p {
            color: #666;
            margin: 0;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .contact-form h2 {
            color: var(--dark-color);
            margin-bottom: 30px;
        }

        .input-box {
            position: relative;
            margin-bottom: 25px;
        }

        .input-box input,
        .input-box textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #eee;
            border-radius: 5px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .input-box span {
            position: absolute;
            left: 15px;
            top: 15px;
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-box input:focus,
        .input-box textarea:focus,
        .input-box input:valid,
        .input-box textarea:valid {
            border-color: var(--primary-color);
        }

        .input-box input:focus ~ span,
        .input-box textarea:focus ~ span,
        .input-box input:valid ~ span,
        .input-box textarea:valid ~ span {
            transform: translateY(-20px);
            font-size: 0.8rem;
            color: var(--primary-color);
        }

        .input-box textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #5A51E6;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .contact-info {
                grid-template-columns: 1fr;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="contact-section">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Paw me aims to create a comprehensive environment to support both new and experienced pet owners, making pet adoption and care easier and more effective.</p>
        </div>

        <div class="contact-info">
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-info-content">
                    <h4>Address</h4>
                    <p>Mirpur, Dhaka, Bangladesh</p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-info-content">
                    <h4>Phone</h4>
                    <p>
                        +880 1845-516826<br>
                        +880 1610-993851<br>
                        +880 1860-218668
                    </p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-info-content">
                    <h4>Email</h4>
                    <p>
                        nisratafrin826@gmail.com<br>
                        janiefaria315@gmail.com<br>
                        richmondantor2@gmail.com
                    </p>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <h2>Send Message</h2>
            <form id="contact-form">
                <div class="input-box">
                    <input type="text" required>
                    <span>Full Name</span>
                </div>
                
                <div class="input-box">
                    <input type="email" required>
                    <span>Email Address</span>
                </div>
                
                <div class="input-box">
                    <textarea required></textarea>
                    <span>Your Message</span>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html>