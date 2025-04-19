<?php
session_start(); // Start the session

// Check if session is not set and redirect to login page if the user is not logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $trade_id = $_POST["trade_id"];
    $conn->query("INSERT INTO Trainees (FirstNames, LastName, Gender, Trade_Id) VALUES ('$fname', '$lname', '$gender', $trade_id)");
    header("Location: list_trainees.php");
}
$trades = $conn->query("SELECT * FROM Trade");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainee - Gikonko TSS Portal</title>
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
        .btn-submit {
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
        .btn-submit:hover {
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
    <h2>Add Trainee</h2>
    <form method="post">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="trade_id">Trade</label>
            <select class="form-control" name="trade_id" id="trade_id" required>
                <?php while ($row = $trades->fetch_assoc()) { ?>
                    <option value="<?php echo $row['Trade_Id']; ?>"><?php echo $row['Trade_Name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn-submit">Add Trainee</button>
    </form>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
