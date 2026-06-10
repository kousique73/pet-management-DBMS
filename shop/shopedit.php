<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petbondhu";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle form submissions (Add, Modify, Delete)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle "Add Product"
    if (isset($_POST['add_product'])) {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        // File upload handling
        $target_dir = "vendor/img/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image_name = basename($_FILES["image_url"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            $image_url = $image_name;
        } else {
            echo "Failed to upload image.";
            exit;
        }

        $stmt = $mysqli->prepare("INSERT INTO petbondhu_shop (product_name, price, image_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $product_name, $price, $image_url);
        $stmt->execute();
        echo "<div class='alert alert-success'>Product added successfully!</div>";
    }

    // Handle "Modify Product"
    if (isset($_POST['modify_product'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        $stmt = $mysqli->prepare("UPDATE petbondhu_shop SET product_name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $product_name, $price, $id);
        $stmt->execute();
        echo "<div class='alert alert-success'>Product updated successfully!</div>";
    }

    // Handle "Delete Product"
    if (isset($_POST['delete_product'])) {
        $id = $_POST['id'];
        $stmt = $mysqli->prepare("DELETE FROM petbondhu_shop WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "<div class='alert alert-success'>Product deleted successfully!</div>";
    }
}

// Fetch all products for display
$result = $mysqli->query("SELECT * FROM petbondhu_shop");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../image/shopbg1.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem;
            background: rgba(0,0,0,0.7);
            border-radius: 15px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .card-header {
            background: #ff9800;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .form-group label {
            color: #ff9800;
        }

        .btn-primary {
            background: #ff9800;
            border-color: #ff9800;
        }

        .btn-primary:hover {
            background: #e68a00;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .modal-content {
            border-radius: 15px;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Manage Products</h1>

    <!-- Add Product Modal -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            <i class="fas fa-plus"></i> Add New Product
        </button>
    </div>

    <!-- Add Product Form -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.01" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image_url" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_product" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Current Products Table -->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-table"></i> Current Products
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <td>৳<?= number_format($row['price'], 2) ?></td>
                        <td><img src="vendor/img/<?= htmlspecialchars($row['image_url']) ?>" alt="Product Image"></td>
                        <td>
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-sm btn-warning" 
                                    data-toggle="modal" 
                                    data-target="#editModal<?= $row['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- Delete Button -->
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete_product" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Product</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" 
                                                   name="product_name" 
                                                   value="<?= htmlspecialchars($row['product_name']) ?>" 
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" step="0.01" class="form-control" 
                                                   name="price" 
                                                   value="<?= $row['price'] ?>" 
                                                   required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="modify_product" class="btn btn-primary">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$mysqli->close();
?>