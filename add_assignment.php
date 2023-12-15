<?php
include 'db.php';

// Fetch classes for dropdown
$classes = $conn->query("SELECT * FROM classes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Assignment</h2>
        <form method="post" action="add_assignment.php">
            <div class="form-group">
                <label for="assignment_name">Assignment Name:</label>
                <input type="text" class="form-control" name="assignment_name" required>
            </div>
            <div class="form-group">
                <label for="class_id">Select Class:</label>
                <select class="form-control" name="class_id" required>
                    <?php while ($class = $classes->fetch_assoc()) : ?>
                        <option value="<?= $class['id'] ?>"><?= $class['class_name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Add Assignment</button>
        </form>

        <a class="btn btn-secondary mt-3" href="index.php">Back to Home</a>
    </div>
</body>
</html>
