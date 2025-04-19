<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trade List</title>
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
        .btn-sm {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📋 Trade List</h2>
        <a href="add_trade.php" class="btn btn-success">➕ Add Trade</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Trade Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM Trade");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Trade_Id']}</td>
                    <td>{$row['Trade_Name']}</td>
                    <td>
                        <a href='edit_trade.php?id={$row['Trade_Id']}' class='btn btn-sm btn-warning'>✏️ Edit</a>
                        <a href='delete_trade.php?id={$row['Trade_Id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this trade?');\">🗑️ Delete</a>
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
