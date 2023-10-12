<?php require 'header.php'; ?>

<div class="row">
    <div class="main">
        <form method="post" action="<?= $operation;?>">

            <label for="product_type_code">Product type code: </label><br>
            <input type="text" id="product_type_code" name="product_type_code" value="<?= $type; ?>" required><br>

            <label for="supplier_id">Supplier id: </label><br>
            <input type="text" id="supplier_id" name="supplier_id" value="<?= $supplier; ?>" required><br>

            <label for="product_name">Product name: </label><br>
            <input type="text" id="product_name" name="product_name" value="<?= $product_name; ?>" required><br>

            <label for="product_price">Product price: </label><br>
            <input type="number" min="1" step="any" id="product_price" name="product_price" value="<?= $price; ?>" required><br>

            <label for="other_product_details">Details: </label><br>
            <input type="text" id="other_product_details" name="other_product_details" value="<?= $details; ?>" required><br>
            <br>
            <input type="submit" name="submit" value="submit" >
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>