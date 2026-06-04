<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "petbondhu"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete operation
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

// Handle add operation
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $user_photo = $_FILES['user_photo']['name'];

    // Upload user photo
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);

    $sql = "INSERT INTO users (username, email, password_hash, created_at, user_photo, address) 
            VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $password_hash, $user_photo, $address);
    $stmt->execute();
}

// Handle update operation
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $user_photo = $_FILES['user_photo']['name'];

    if ($user_photo) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
        move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);

        $sql = "UPDATE users SET username = ?, email = ?, address = ?, user_photo = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $email, $address, $user_photo, $user_id);
    } else {
        $sql = "UPDATE users SET username = ?, email = ?, address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $email, $address, $user_id);
    }
    $stmt->execute();
}

// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #6C63FF;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .table img {
            max-width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #6C63FF;
            border: none;
        }
        .btn-danger {
            background-color: #FF6B6B;
            border: none;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .user-photo {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Manage Users</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add New User</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Profile Photo</label>
                            <input type="file" class="form-control-file" name="user_photo">
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">User List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['user_id']) ?></td>
                                <td>
                                    <?php if ($row['user_photo']): ?>
                                        <img src="<?= htmlspecialchars($row['user_photo']) ?>" 
                                             alt="User Photo" 
                                             class="user-photo img-thumbnail">
                                    <?php else: ?>
                                        <span class="text-muted">No photo</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td>
                                    <!-- Update Form -->
                                    <button class="btn btn-sm btn-primary mb-1" 
                                            data-toggle="modal" 
                                            data-target="#editModal<?= $row['user_id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="" method="POST" class="d-inline">
                                        <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?= $row['user_id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" 
                                                           name="username" 
                                                           value="<?= htmlspecialchars($row['username']) ?>" 
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" 
                                                           name="email" 
                                                           value="<?= htmlspecialchars($row['email']) ?>" 
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" 
                                                           name="address" 
                                                           value="<?= htmlspecialchars($row['address']) ?>" 
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>New Photo</label>
                                                    <input type="file" class="form-control-file" 
                                                           name="user_photo">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();