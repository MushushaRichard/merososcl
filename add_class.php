<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_name = $_POST['class_name'];

    $sql = "INSERT INTO classes (class_name) VALUES ('$class_name')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Class</h2>
        <form method="post" action="add_class.php">
            <div class="form-group">
                <label for="class_name">Class Name:</label>
                <input type="text" class="form-control" name="class_name" required>
            </div>
            <button type="submit" class="btn btn-warning">Add Class</button>
        </form>

        <a class="btn btn-secondary mt-3" href="index.php">Back to Home</a>
    </div>
</body>
</html>
