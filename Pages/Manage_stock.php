<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

// Include any necessary files and database connections

// Process form submission (updating product information)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $item_name = $_POST["item_name"];
    $item_id = $_POST["item_id"];
    $supplier_name = $_POST["supplier_name"];
    $supplier_id = $_POST["supplier_id"];
    $quantity = $_POST["quantity"];
    $price_per_unit = $_POST["price_per_unit"];
    $item_category = $_POST["item_category"];

    // Validate form data (ensure required fields are not empty, etc.)

    // Process updating product information in the database
    // Example:
    // $success = updateProductInformation($item_name, $item_id, $supplier_name, $supplier_id, $quantity, $price_per_unit, $item_category);

    // Redirect to appropriate page based on success or failure
    // Example:
    // if ($success) {
    //     header("Location: update_product_information.php?success=1");
    //     exit();
    // } else {
    //     $error_message = "Failed to update product information. Please try again.";
    // }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product Information</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="container">
        <h1>Update Product Information</h1>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="item_name">Stock Item Name:</label>
                <input type="text" name="item_name" id="item_name" value="" required />
            </div>
            <div class="form-group">
                <label for="item_id">Stock Item ID#:</label>
                <input type="text" name="item_id" id="item_id" value="" />
            </div>
            <div class="form-group">
                <label for="supplier_name">Supplier Name:</label>
                <input type="text" name="supplier_name" id="supplier_name" value="" />
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier ID:</label>
                <input type="text" name="supplier_id" id="supplier_id" value="" />
            </div>
            <div class="form-group">
                <label for="quantity">Quantity#:</label>
                <input type="text" name="quantity" id="quantity" value="0" />
                <button type="button" onclick="decrement()">-</button>
                <button type="button" onclick="increment()">+</button>
            </div>
            <div class="form-group">
                <label for="price_per_unit">Price/Unit (GBP £):</label>
                <input type="text" name="price_per_unit" id="price_per_unit" value="" />
            </div>
            <div class="form-group">
                <label for="item_category">Item Category:</label>
                <input type="text" name="item_category" id="item_category" value="" />
            </div>
            <button type="submit" class="btn">Update Product Information</button>
        </form>
    </div>
</body>
</html>

<script>
    function increment() {
        var quantityInput = document.getElementById('quantity');
        var quantityValue = parseInt(quantityInput.value);
        quantityInput.value = quantityValue + 1;
    }

    function decrement() {
        var quantityInput = document.getElementById('quantity');
        var quantityValue = parseInt(quantityInput.value);
        if (quantityValue > 0) {
            quantityInput.value = quantityValue - 1;
        }
    }
</script>