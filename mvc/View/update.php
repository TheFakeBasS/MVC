<?php
include 'view/header.php';
?>
<!DOCTYPE HTML>
<html>
<head>
</head>

<body>

<form method="post" action="index.php?op=create">
<label>Name:</label><br>
<input type="text" for= "name" name="name"><br>

<label>phone:</label><br>
<input type="text" for= "phone" name="phone"><br>

<label>email:</label><br>
<input type="text" for= "email" name="email"><br>

<label>address:</label><br>
<input type="text" for= "address" name="address"><br>


<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
<?php
include 'view/footer.php';
?>