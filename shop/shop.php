<?php
session_start();

// Database connection (directly in this file, if config.php is missing)
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "petbondhu"; // Your database name

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch products from petbondhu_shop table
$ret = "SELECT * FROM petbondhu_shop ORDER BY id DESC"; // Get products ordered by the latest
$stmt = $mysqli->prepare($ret);
$stmt->execute(); // Execute query
$res = $stmt->get_result();
?>

<?php include('../header/header.php'); ?> <!-- Header Section -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Accessories Shop</title>
    <link rel="stylesheet" href="shop.css">
    <style>
        .add-to-cart-btn {
  background: linear-gradient(135deg, #ff7f50, #ff6347); /* Gradient background */
  border: none; /* Remove default border */
  color: #ffffff; /* White text for contrast */
  font-family: 'Poppins', sans-serif; /* Modern font */
  font-size: 1rem; /* Slightly larger font size */
  font-weight: 500; /* Medium font weight for emphasis */
  padding: 12px 30px; /* Comfortable padding for touch targets */
  border-radius: 30px; /* Fully rounded corners */
  cursor: pointer; /* Pointer cursor for interactivity */
  transition: all 0.3s ease; /* Smooth transitions for hover effects */
  box-shadow: 0 4px 10px rgba(255, 127, 80, 0.4); /* Subtle shadow for depth */
}

.add-to-cart-btn:hover {
  background: linear-gradient(135deg, #ff6347, #ff7f50); /* Reverse gradient on hover */
  transform: translateY(-3px); /* Slight upward movement */
  box-shadow: 0 6px 15px rgba(255, 127, 80, 0.6); /* Enhanced shadow on hover */
}

.add-to-cart-btn:active {
  transform: translateY(0); /* Reset position when clicked */
  box-shadow: 0 4px 10px rgba(255, 127, 80, 0.4); /* Reduce shadow for pressed effect */
}

/* Accessibility: Ensure focus state is visible */
.add-to-cart-btn:focus {
  outline: none; /* Remove default outline */
  box-shadow: 0 0 0 3px rgba(255, 127, 80, 0.5); /* Add a glowing effect for focus */
}
        </style>
</head>
<body style="background-image: url('../image/Picture17.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">




<!-- Shop Section -->
<div class="shop-container">
    <h1 class="shop-title"><center>Pet Accessories Shop</center></h1>
    <div class="product-grid">
        <?php
        // Display products from the database
        while ($row = $res->fetch_object()) {
        ?>
        <div class="product-card">
            <img class="product-image" src="vendor/img/<?php echo $row->image_url; ?>" alt="<?php echo $row->product_name; ?>">
            <div class="product-details">
                <h3 class="product-name"><?php echo $row->product_name; ?></h3>
                <p class="product-price">৳<?php echo $row->price; ?></p>

                <!-- Add to Cart Form -->
                <form action="shop.php" method="POST">
                    <input type="hidden" name="product_name" value="<?php echo $row->product_name; ?>">
                    <input type="hidden" name="price" value="<?php echo $row->price; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $row->id; ?>">
                    <input type="hidden" name="image_url" value="<?php echo $row->image_url; ?>">
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Cart Link -->
<a href="../cart/cart.php" class="sticky-btn">🛒 View Cart</a>

</body>
</html>

<?php
// Add product to cart if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    // Check if the product already exists in the cart
    if (!isset($_SESSION['cart'][$product_id])) {
        // Initialize the product in the cart with all required keys
        $_SESSION['cart'][$product_id] = array(
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => 1, // Initialize quantity to 1
            'image_url' => $image_url // Store the image URL
        );
    } else {
        // If product already in cart, increase the quantity
        $_SESSION['cart'][$product_id]['quantity']++;
    }
}

// Close connection
$mysqli->close();
?>
