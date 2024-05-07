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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the Product ID from the form
    $product_id = $_POST['item_id'];

    // Prepare SQL statement to select product information based on Product ID
    $sql = "SELECT Product_Name, Supplier_ID, Quantity, Price_Per_Unit, Product_Desc FROM product WHERE Product_ID = ?";

    // Prepare and bind parameter
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $product_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Fetch data
        $row = $result->fetch_assoc();

        // Prepare the response as an associative array
        $response = array(
            'itemName' => $row['Product_Name'],
            'supplier' => $row['Supplier_ID'],
            'Quantity' => $row['Quantity'],
            'PPU' => $row['Price_Per_Unit'],
            'Item_Desc' => $row['Product_Desc']
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // No rows found for the provided Product ID
        http_response_code(404);
        echo json_encode(array('error' => 'Product not found.'));
    }

    // Close statement
    $stmt->close();
} else {
    // If the request method is not POST, return an error response
    http_response_code(400);
    echo json_encode(array('error' => 'Invalid request method.'));
}

$conn->close();
?>