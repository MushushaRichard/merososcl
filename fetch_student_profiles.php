<?php
// Include your database connection
include 'db.php';

// Fetch student profiles from the database
$result = $conn->query("SELECT * FROM students LIMIT 5");

// Prepare data for JSON encoding
$studentProfiles = [];
while ($row = $result->fetch_assoc()) {
    $studentProfiles[] = [
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name']
    ];
}

// Return JSON-encoded data
header('Content-Type: application/json');
echo json_encode($studentProfiles);
?>
