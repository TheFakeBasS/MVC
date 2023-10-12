<?php
require_once 'model/DataHandler.php';
require_once 'model/TableLogic.php';

class ProductsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'mvc' ,'root' ,'');
	}
	
	public function createProduct(){
		$sql = "INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES (NULL, '$product_id', '$type',  '$supplier', '$product_name', '$price', '$details');";
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
		$sql = 'SELECT  * FROM products WHERE product_id =' . $id;
		$result = $this->DataHandler->readData($sql);
		return $result;
	}

    public function updateProduct($product_id, $type,  $supplier, $product_name, $price, $details) {
        try {
            $sql = "UPDATE Products SET product_type_code = '" . $type . "', supplier_id = '" . $supplier . "', product_name = '" . $product_name . "', product_price = '" . $price . "', other_product_details = '" . $details . "' WHERE product_id = " . $product_id;
            $result = $this->DataHandler->updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

	public function deleteProduct($id){
        $sql = 'DELETE FROM products WHERE product_id ='. $id;
        $result = $this->DataHandler->deleteData($sql);
        return $result;
    }
public function searchProduct($search){
        $id = "SELECT * FROM products WHERE product_id LIKE '$search%' OR product_name LIKE '$search%';";
        $result = $this->DataHandler->readData($id);
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

