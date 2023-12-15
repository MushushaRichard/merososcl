<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['course_name'];

    $sql = "INSERT INTO courses (course_name) VALUES ('$course_name')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Course</h2>
        <form method="post" action="add_course.php">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" name="course_name" required>
            </div>
            <button type="submit" class="btn btn-success">Add Course</button>
        </form>

        <a class="btn btn-secondary mt-3" href="index.php">Back to Home</a>
    </div>
</body>
</html>
