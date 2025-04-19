<?php
session_start();  // Ensure the session is started at the beginning of the script

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include "config.php";  // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["trade_name"];
    $conn->query("INSERT INTO Trade (Trade_Name) VALUES ('$name')");
    header("Location: list_trades.php");  // Redirect after successful insertion
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trade - Gikonko TSS Portal</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            padding-top: 80px; /* Adjust for fixed navbar */
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-add {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-add:hover {
            background-color: #0056b3;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gikonko TSS Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="list_trades.php">Manage Trades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_trainees.php">Manage Trainees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_marks.php">Add Marks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php">View Report</a>
                </li>
            </ul>
            <span class="navbar-text text-white me-3">
                👋 Welcome, <?php echo $_SESSION["username"]; ?>
            </span>
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Add Trade</h2>
    <form method="post">
        <div class="form-group">
            <label for="trade_name">Trade Name</label>
            <input type="text" class="form-control" id="trade_name" name="trade_name" required>
        </div>
        <button type="submit" class="btn-add">Add Trade</button>
    </form>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
