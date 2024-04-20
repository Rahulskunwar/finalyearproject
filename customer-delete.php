<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$database = "login_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if customer ID is provided
if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];

    // SQL to delete customer
    $sql = "DELETE FROM registered WHERE id = $customer_id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Customer ID not provided"));
}

$conn->close();
?>
