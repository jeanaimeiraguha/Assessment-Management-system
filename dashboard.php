<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make it take the full height of the screen */
            text-align: center;
        }
        .welcome h2 {
            margin-bottom: 20px;
        }
        .welcome p {
            font-size: 1.2rem;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .footer-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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

<div class="container welcome">
    <h2 class="mb-3">Welcome to the Gikonko TSS Portal!</h2>
    <p class="lead">Hello, <?php echo $_SESSION["username"]; ?>! We're excited to have you here. Explore the system using the navigation bar above to manage trades, trainees, and more.</p>
</div>

<!-- Footer with Copyright and Developer Information -->
<footer>
    <div class="footer-info">
        <p>&copy; <?php echo date("Y"); ?> Gikonko TSS Portal. All rights reserved.</p>
        <p>Developed by <a href="https://www.linkedin.com/in/iraguha-jean-aime-77a13b318/" target="_blank">Jean Aime IRAGUHA</a></p>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
