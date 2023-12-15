<?php
// Include the database connection file (db.php) and start the session
include 'db.php';
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Fetch data from the database
$students = $conn->query("SELECT * FROM students");
$teachers = $conn->query("SELECT * FROM teachers");
$courses = $conn->query("SELECT * FROM courses");
$classes = $conn->query("SELECT * FROM classes");
$assignments = $conn->query("SELECT * FROM assignments");
$grades = $conn->query("SELECT * FROM grades");
$attendance = $conn->query("SELECT * FROM attendance");
$messages = $conn->query("SELECT * FROM messages");
$exams = $conn->query("SELECT * FROM exams");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 70px;
            }
        }

        .container {
            max-width: 800px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">School Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#students">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#teachers">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#classes">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#assignments">Assignments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#grades">Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#attendance">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#exams">Exams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#messages">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#search">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Welcome, <?= $_SESSION['user'] ?></h2>

        <!-- Card components for each section -->
        <div class="card" id="students">
            <div class="card-body">
                <h3 class="card-title">Students</h3>
                <ul class="list-group">
                    <?php while ($student = $students->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $student['first_name'] . ' ' . $student['last_name'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="teachers">
            <div class="card-body">
                <h3 class="card-title">Teachers</h3>
                <ul class="list-group">
                    <?php while ($teacher = $teachers->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $teacher['first_name'] . ' ' . $teacher['last_name'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="courses">
            <div class="card-body">
                <h3 class="card-title">Courses</h3>
                <ul class="list-group">
                    <?php while ($course = $courses->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $course['course_name'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="assignments">
            <div class="card-body">
                <h3 class="card-title">Assignments</h3>
                <ul class="list-group">
                    <?php while ($assignment = $assignments->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $assignment['assignment_name'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="grades">
            <div class="card-body">
                <h3 class="card-title">Grades</h3>
                <ul class="list-group">
                    <?php while ($grade = $grades->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $grade['grade'] ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="attendance">
            <div class="card-body">
                <h3 class="card-title">Attendance</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($record = $attendance->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $record['student_id'] ?></td>
                                <td><?= $record['class_id'] ?></td>
                                <td><?= $record['date'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" id="exams">
            <div class="card-body">
                <h3 class="card-title">Exams</h3>
                <ul class="list-group">
                    <?php while ($exam = $exams->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $exam['exam_name'] ?> (Date: <?= $exam['exam_date'] ?>)</li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="messages">
            <div class="card-body">
                <h3 class="card-title">Messages</h3>
                <ul class="list-group">
                    <?php while ($message = $messages->fetch_assoc()) : ?>
                        <li class="list-group-item"><?= $message['sender'] ?>: <?= $message['message'] ?> (Date: <?= $message['date'] ?>)</li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="card" id="search">
            <div class="card-body">
                <h3 class="card-title">Search</h3>
                <form>
                    <div class="form-group">
                        <label for="searchInput">Search:</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Enter search term">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <!-- Additional sections for upcoming assignments, notifications, and student profiles -->
        <div class="card" id="upcoming_assignments">
            <div class="card-body">
                <h3 class="card-title">Upcoming Assignments</h3>
                <ul id="upcomingAssignmentsList" class="list-group">
                    <!-- Content will be dynamically loaded here using JavaScript -->
                </ul>
            </div>
        </div>

        <div class="card" id="notifications">
            <div class="card-body">
                <h3 class="card-title">Notifications</h3>
                <ul id="notificationsList" class="list-group">
                    <!-- Content will be dynamically loaded here using JavaScript -->
                </ul>
            </div>
        </div>

        <div class="card" id="student_profiles">
            <div class="card-body">
                <h3 class="card-title">Student Profiles</h3>
                <ul id="studentProfilesList" class="list-group">
                    <!-- Content will be dynamically loaded here using JavaScript -->
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to fetch and display upcoming assignments
        function fetchUpcomingAssignments() {
            $.ajax({
                url: 'fetch_upcoming_assignments.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var upcomingAssignmentsList = $('#upcomingAssignmentsList');
                    upcomingAssignmentsList.empty();
                    data.forEach(function (assignment) {
                        upcomingAssignmentsList.append('<li class="list-group-item">' + assignment.assignment_name + ' (Due Date: ' + assignment.due_date + ')</li>');
                    });
                },
                error: function (error) {
                    console.error('Error fetching upcoming assignments:', error);
                }
            });
        }

        // Function to fetch and display notifications
        function fetchNotifications() {
            $.ajax({
                url: 'fetch_notifications.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var notificationsList = $('#notificationsList');
                    notificationsList.empty();
                    data.forEach(function (notification) {
                        notificationsList.append('<li class="list-group-item">' + notification.message + ' (Created At: ' + notification.created_at + ')</li>');
                    });
                },
                error: function (error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }

        // Function to fetch and display student profiles
        function fetchStudentProfiles() {
            $.ajax({
                url: 'fetch_student_profiles.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var studentProfilesList = $('#studentProfilesList');
                    studentProfilesList.empty();
                    data.forEach(function (profile) {
                        studentProfilesList.append('<li class="list-group-item">' + profile.first_name + ' ' + profile.last_name + '</li>');
                    });
                },
                error: function (error) {
                    console.error('Error fetching student profiles:', error);
                }
            });
        }

        // Fetch and display data on page load
        fetchUpcomingAssignments();
        fetchNotifications();
        fetchStudentProfiles();

        // Optionally, you can set intervals to periodically update the content
        setInterval(fetchUpcomingAssignments, 60000); // Update every minute
        setInterval(fetchNotifications, 60000); // Update every minute
        setInterval(fetchStudentProfiles, 60000); // Update every minute
    </script>
</body>
</html>
