<?php
include 'view/header.php';
?>
<!DOCTYPE HTML>
<html>
<head>
</head>

<body>

<form method="post" action="index.php?act=products&op=create">
<label>product type code:</label><br>
<input type="text" for= "product_type_code" name="product_type_code" required><br>

<label>supplier id:</label><br>
<input type="text" for= "supplier_id" name="supplier_id" required><br>

<label>product name:</label><br>
<input type="text" for= "product_name" name="product_name" required><br>

<label>product price:</label><br>
<input type="text" for= "product_price" name="product_price" required><br>

<label>other product details:</label><br>
<input type="text" for= "other_product_details" name="other_product_details" required><br>


<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php
include 'view/footer.php';
?>
