<?php 
include'header.php';?>
<form method="POST" action="index.php?act=products&op=search">
    <input type="text" name="search" placeholder="Search...">
    <input type="submit" name="submit" value="Search">
</form>
<?php   
echo $result;
include'footer.php'; 
?>