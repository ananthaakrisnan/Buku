<?php
session_start();
include('connect.php');

// Initialize the error variable to an empty string
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind parameters to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Valid user, set session
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        // Set error message if credentials are incorrect
        $error = "Nama pengguna atau kata laluan tidak sah";
    }
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-primary {
            width: 100%;
        }

        .alert {
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>

        <h2>Login to Your Account</h2>

        <!-- Display the error message if there's any -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        
        
    </div>
</body>
</html>
