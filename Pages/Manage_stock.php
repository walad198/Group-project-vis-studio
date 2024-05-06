<?php
session_start();


if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}


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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/managestock.css" />
</head>

<body>
    <div class="container">
        <h2 class="title">Update Product Information</h2>
        <div class="product-info">
            <div class="product-image">
                <img class="image" src="../images/mouse.png" alt="Product Image">
                <div class="product-description">
                    <h3 class="productTitle">Gaming Mouse</h3> <!-- Change to pull from databse -->
                    <p class="description">A gaming mouse is a specialized computer peripheral tailored for gaming,
                        characterized by its ergonomic design ensuring comfort during prolonged gaming sessions, high
                        DPI
                        for precise cursor movements, programmable buttons enabling quick execution of in-game actions.
                    </p> <!-- Change to pull from databse -->
                </div>

            </div>
            <div class="product-details">

                <div class="input-group">
                    <input type="text" class="stock-item-name" placeholder="">
                    <span class="placeholder">Stock Item Name</span>
                </div>
                <div class="input-group">
                    <input type="text" class="stock-item-id" placeholder="">
                    <span class="placeholder">Stock Item ID#</span>
                </div>
                <div class="input-group">
                    <input type="text" class="supplier-name" placeholder="">
                    <span class="placeholder">Supplier Name</span>
                </div>

                <div class="input-group">
                    <input type="number" class="quantity-input" value="1">
                    <span class="placeholder">Quantity</span>
                </div>

                <div class="input-group">
                    <input type="text" class="price" placeholder="">
                    <span class="placeholder">Price</span>
                </div>

                <div class="dropdown-container">
                    <label class="placeholder" for="dropdown">Choose an option:</label>
                    <select id="dropdown">
                        <option value="option1">Mobile Phone</option> <!--  Update to the database catagories -->
                        <option value="option2">Peripheral</option>
                        <option value="option3">Opition 3</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button class="save-btn">Save</button>
            <button class="cancel-btn">Cancel</button>
        </div>
    </div>


</body>

</html>