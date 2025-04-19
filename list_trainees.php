<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainees List</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .table-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">👥 Trainee List</h2>
        <a href="add_trainee.php" class="btn btn-success">➕ Add Trainee</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Trade</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT T.*, Tr.Trade_Name FROM Trainees T JOIN Trade Tr ON T.Trade_Id = Tr.Trade_Id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Trainee_Id']}</td>
                    <td>{$row['FirstNames']} {$row['LastName']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Trade_Name']}</td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap 5 JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
