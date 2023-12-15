<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "school_management";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample data insertion for students
$conn->query("INSERT INTO students (first_name, last_name) VALUES ('John', 'Doe')");
$conn->query("INSERT INTO students (first_name, last_name) VALUES ('Jane', 'Smith')");

// Sample data insertion for teachers
$conn->query("INSERT INTO teachers (first_name, last_name) VALUES ('Professor', 'Johnson')");
$conn->query("INSERT INTO teachers (first_name, last_name) VALUES ('Dr.', 'Smith')");

// Sample data insertion for courses
$conn->query("INSERT INTO courses (course_name) VALUES ('Mathematics')");
$conn->query("INSERT INTO courses (course_name) VALUES ('Science')");

// Sample data insertion for classes
$conn->query("INSERT INTO classes (class_name) VALUES ('Class A')");
$conn->query("INSERT INTO classes (class_name) VALUES ('Class B')");

// Sample data insertion for assignments
$conn->query("INSERT INTO assignments (assignment_name, due_date) VALUES ('Homework 1', '2023-12-20')");
$conn->query("INSERT INTO assignments (assignment_name, due_date) VALUES ('Lab Report', '2023-12-25')");

// Sample data insertion for grades
$conn->query("INSERT INTO grades (grade) VALUES ('A')");
$conn->query("INSERT INTO grades (grade) VALUES ('B')");

// Sample data insertion for attendance
$conn->query("INSERT INTO attendance (student_id, class_id, date) VALUES (1, 1, '2023-12-10')");
$conn->query("INSERT INTO attendance (student_id, class_id, date) VALUES (2, 2, '2023-12-12')");


?>
