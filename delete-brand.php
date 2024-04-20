<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if customer ID is provided
if (isset($_POST['brand_id'])) {
    $brand_id = $_POST['brand_id'];

    // SQL to delete customer
    $sql = "DELETE FROM brand WHERE brand_id = $brand_id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Brand ID not provided"));
}

$conn->close();
?>
