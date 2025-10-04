<?php
// Include database connection
include_once 'db.php';

// Fetch data from database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if any records found
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"] . " - Email: " . $row["email"] . " - Age: " . $row["age"] . "<br>";
    }
} else {
    echo "No records found";
}

// Close database connection
mysqli_close($conn);
?>