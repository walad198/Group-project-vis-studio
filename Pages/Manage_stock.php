<?php
session_start();

if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Currently not using the POST data in this script
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
    <script>
        function searchItem() {
            var item_id = document.getElementById("item_id").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        // Populate input boxes with retrieved product information
                        document.getElementById("itemName").value = response.itemName;
                        document.getElementById("itemTitle").innerHTML = response.itemName;
                        document.getElementById("supplier").value = response.supplier;
                        document.getElementById("Quantity").value = response.Quantity;
                        document.getElementById("PPU").value = response.PPU;
                        document.getElementById("Item_Desc").innerHTML = response.Item_Desc;
                        var productImage = document.getElementById("productImage");
                        productImage.src = "../images/" + item_id + ".png";

                    } else {
                        alert('Error: ' + xhr.status);
                    }
                }
            };

            xhr.open('POST', 'search_item.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('item_id=' + encodeURIComponent(item_id));
        }

        function saveItem() {
            var itemName = document.getElementById("itemName").value;
            var itemID = document.getElementById("item_id").value;
            var supplier = document.getElementById("supplier").value;
            var quantity = document.getElementById("Quantity").value;
            var ppu = document.getElementById("PPU").value;



            var formData = new FormData();
            formData.append('itemName', itemName);
            formData.append('itemID', itemID);
            formData.append('supplier', supplier);
            formData.append('quantity', quantity);
            formData.append('ppu', ppu);


            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response from server
                        alert("Item information updated successfully!");
                    } else {
                        // Handle error response from server
                        alert('Error: ' + xhr.status);
                    }
                }
            };

            xhr.open('POST', 'save_item.php', true);
            xhr.send(formData);
        }

        function clearFields() {
            productImage.src = "";
            document.getElementById("itemTitle").innerHTML = "";
            document.getElementById("itemName").value = "";
            document.getElementById("item_id").value = "";
            document.getElementById("supplier").value = "";
            document.getElementById("Quantity").value = "";
            document.getElementById("PPU").value = "";
            document.getElementById("Item_Desc").innerHTML = ""; // Clear inner HTML content if it's a <p> tag
        }
    </script>


</head>




<body>
    <div class="container">
        <h2 class="title">Update Product Information</h2>
        <div class="product-info">
            <div class="product-image">
                <img id="productImage" class="image" src="" alt="Product Image">
                <div class="product-description">
                    <h3 class="productTitle" id="itemTitle"></h3> <!-- Change to pull from database -->
                    <p class="description" name="Item_Desc" id="Item_Desc"></p>
                </div>
            </div>
            <div class="product-details">

                <div class="input-group">
                    <input type="text" class="stock-item-name" name="itemName" id="itemName" placeholder="">
                    <span class="placeholder">Stock Item Name</span>
                </div>

                <div class="input-group">
                    <input type="text" class="stock-item-id" name="item_id" id="item_id" placeholder="">
                    <span class="placeholder">Stock Item ID#</span>
                    <button type="button" class="search" onclick="searchItem()">GO</button>

                </div>

                <div class="input-group">
                    <input type="text" class="supplier-name" name="supplier" id="supplier" placeholder="">
                    <span class="placeholder">Supplier Name</span>
                </div>
                <div class="input-group">
                    <input type="number" class="quantity-input" name="Quantity" id="Quantity" value="">
                    <span class="placeholder">Quantity</span>
                </div>
                <div class="input-group">
                    <input type="number" step="0.01" class="price" name="PPU" id="PPU" placeholder="">
                    <span class="placeholder">Price</span>
                </div>
                <div class="dropdown-container">
                    <span class="optionText" for="dropdown">Category:</label>
                        <select class="option" id="dropdown" name="item_category">
                            <option value="option1">Mobile Phone</option>
                            <!--  Update to the database categories -->
                            <option value="option2">Peripheral</option>
                            <option value="option3">Option 3</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button class="save-btn" onclick="saveItem()">Save</button>
            <button class="cancel-btn" onclick="clearFields()">Clear</button>
        </div>
    </div>

</body>

</html>