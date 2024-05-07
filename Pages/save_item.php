<?php
session_start();
$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "groupdatabase";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}


if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $itemName = $_POST['itemName'];
    $itemID = $_POST['itemID'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $ppu = $_POST['ppu'];


    // Prepare SQL statement to update item information
    $sql = "UPDATE product SET Product_Name=?, Supplier_ID=?, Quantity=?, Price_Per_Unit=? WHERE Product_ID=?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $itemName, $supplier, $quantity, $ppu, $itemID);

    // Execute the statement
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Respond with a success message
    echo "Item information updated successfully!";
} else {
    // If the request method is not POST, return an error response
    http_response_code(400);
    echo json_encode(array('error' => 'Invalid request method.'));
}
?>