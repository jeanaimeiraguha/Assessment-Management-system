<?php
include "config.php";

// ✅ CSV download logic
if (isset($_GET['download']) && $_GET['download'] == 1) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="competency_report.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Name', 'Total Marks', 'Status']);

    $sql = "SELECT T.FirstNames, T.LastName, M.Total_Marks 
            FROM Marks M
            JOIN Trainees T ON M.Trainee_Id = T.Trainee_Id";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $status = $row['Total_Marks'] >= 70 ? 'Competent' : 'Not Yet Competent';
        $name = $row['FirstNames'] . ' ' . $row['LastName'];
        fputcsv($output, [$name, $row['Total_Marks'], $status]);
    }

    fclose($output);
    exit(); // 🔴 Important: Stop further output
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Competency Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .report-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .competent {
            color: green;
            font-weight: bold;
        }
        .not-competent {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container report-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📊 Competency Report</h2>
        <a href="?download=1" class="btn btn-success">⬇️ Download CSV</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Total Marks</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ✅ Fetch and show data in HTML
            $sql = "SELECT T.FirstNames, T.LastName, M.Total_Marks 
                    FROM Marks M
                    JOIN Trainees T ON M.Trainee_Id = T.Trainee_Id";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $status = $row["Total_Marks"] >= 70 ? "<span class='competent'>Competent</span>" : "<span class='not-competent'>Not Yet Competent</span>";
                echo "<tr>
                        <td>{$row['FirstNames']} {$row['LastName']}</td>
                        <td>{$row['Total_Marks']}</td>
                        <td>$status</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Optional Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
