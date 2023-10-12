<?php
require_once 'model/DataHandler.php';
require_once 'model/TableLogic.php';

class ProductsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'mvc' ,'root' ,'');
	}
	
	public function createProduct(){
		$sql = "INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES (NULL, '$type_code', '$supplier', '$name', '$price','$details');";
		echo $sql;
		$results = $this->DataHandler -> createData($sql);
		return $results;
	}

	public function readProducts(){
		$sql = 'SELECT * FROM products';
		$results = $this->DataHandler->readsData($sql);
		return $results;
	}

	public function readProduct($id){
		$sql = 'SELECT  * FROM products WHERE id =' . $id;
		$result = $this->DataHandler->readData($sql);
		return $result;
	}

	public function updateProduct(){

	}

	public function deleteProduct($id){
        $sql = 'DELETE FROM products WHERE id ='. $id;
        $result = $this->DataHandler->deleteData($sql);
        return $result;
    }
	public function searchProduct($search){
        $sql = "SELECT * FROM products WHERE product_id = $search LIKE product_name = $search";
        $result = $this->DataHandler->readData($sql);
        return $result;
    }
    public function readAllProducts($p = 1){
        $item_per_page = 4;
        $position = (($p-1) * $item_per_page);
        $sql ="SELECT * FROM products LIMIT $position, $item_per_page";
        $results = $this->DataHandler->readsData($sql);
        $pages = $this->DataHandler->readsData('SELECT COUNT(*) FROM products');
        return array($results, $pages);
}
}

