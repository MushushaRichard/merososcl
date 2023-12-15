<?php
// Include your database connection
include 'db.php';

// Fetch upcoming assignments from the database
$result = $conn->query("SELECT * FROM assignments WHERE due_date > NOW() ORDER BY due_date LIMIT 5");

// Prepare data for JSON encoding
$upcomingAssignments = [];
while ($row = $result->fetch_assoc()) {
    $upcomingAssignments[] = [
        'assignment_name' => $row['assignment_name'],
        'due_date' => $row['due_date']
    ];
}

// Return JSON-encoded data
header('Content-Type: application/json');
echo json_encode($upcomingAssignments);
?>
