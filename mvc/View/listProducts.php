<?php 
include'header.php';?>
    <form action="index.php?act=products&op=read" method="POST">
	    <input type="search" name="search" placeholder="Search.."/>
      <button type="submit"><i class="fa fa-search"></i></button>
<?php   
echo $products;
echo $pagebuttons;
include'footer.php'; 
?>