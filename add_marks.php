<?php
include "config.php";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainee_id = $_POST["trainee_id"];
    $trade_id = $_POST["trade_id"];
    $module = $_POST["module"];
    $formative = $_POST["formative"];
    $summative = $_POST["summative"];
    $total = $formative + $summative;

    $stmt = $conn->prepare("INSERT INTO Marks (Trainee_Id, Trade_Id, Module_Name, Formative_Assessment, Summative_Assessment, Total_Marks)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisiid", $trainee_id, $trade_id, $module, $formative, $summative, $total);

    if ($stmt->execute()) {
        $message = "✅ Marks added successfully.";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

$trainees = $conn->query("SELECT * FROM Trainees");
$trades = $conn->query("SELECT * FROM Trade");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Marks</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="mb-4">📝 Add Marks</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Trainee</label>
            <select name="trainee_id" class="form-select" required>
                <option value="">Select Trainee</option>
                <?php
                $trainees = $conn->query("SELECT * FROM Trainees");
                while ($row = $trainees->fetch_assoc()) {
                    echo "<option value='{$row['Trainee_Id']}'>{$row['FirstNames']} {$row['LastName']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Trade</label>
            <select name="trade_id" class="form-select" required>
                <option value="">Select Trade</option>
                <?php
                $trades = $conn->query("SELECT * FROM Trade");
                while ($row = $trades->fetch_assoc()) {
                    echo "<option value='{$row['Trade_Id']}'>{$row['Trade_Name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Module Name</label>
            <input type="text" name="module" class="form-control" placeholder="Enter module name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Formative (/50)</label>
            <input type="number" name="formative" class="form-control" max="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Summative (/50)</label>
            <input type="number" name="summative" class="form-control" max="50" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">✅ Submit Marks</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
