<?php 
include'header.php';?>
<form method="POST" action="index.php?act=products&op=search">
    <input type="text" name="search" placeholder="Search...">
    <input type="submit" name="submit" value="Search">
<?php   
echo $products;
echo $pagebuttons;
include'footer.php'; 
?>     