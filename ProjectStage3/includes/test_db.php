<?php
$conn = new mysqli('localhost', 'root', '', 'visit_victoria');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";

$result = $conn->query("SHOW TABLES;");
while ($row = $result->fetch_array()) {
    echo "<br> Table: " . $row[0];
}

$conn->close();
?>
