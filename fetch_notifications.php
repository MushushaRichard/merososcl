<?php
// Include your database connection
include 'db.php';

// Fetch notifications from the database
$result = $conn->query("SELECT * FROM notifications ORDER BY created_at DESC LIMIT 5");

// Prepare data for JSON encoding
$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = [
        'message' => $row['message'],
        'created_at' => $row['created_at']
    ];
}

// Return JSON-encoded data
header('Content-Type: application/json');
echo json_encode($notifications);
?>
