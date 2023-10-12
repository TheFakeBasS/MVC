<?php
require_once 'Model\ProductsLogic.php';
require_once 'Model\TableLogic.php';
class ProductsController{

	public function __construct() {
		$this->ProductsLogic = new ProductsLogic();
		$this->TableLogic = new TableLogic();
	}

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
			switch ($op) {
				case 'create':
				$this->collectCreateProduct();
				break;
				case 'reads':
				$this->collectReadPagedProducts($_REQUEST['p']);
				break;
				case 'read':
				$this->collectReadProduct($_REQUEST['id']);
				break;
				case 'update':
				$this->collectUpdateProduct();
				break;
				case 'delete':
				$this->collectDeleteProduct($_REQUEST['id']);
				break;
				case 'search';
				$this->collectSearchProduct();
				break;
				default:
				$this->collectReadPagedProducts(1);
				break;
			}
		} catch (ValidationException $e) {
				$errors = $e->getErrors();

		}
	}

	public function collectCreateProduct(){

        if ( isset($_REQUEST['submit']) ) {

		// Collect params if entered
		// Validate and sanitize params
		$type_code       = isset($_REQUEST['product_type_code']) ?  	$_REQUEST['product_type_code']  :NULL;
		$supplier     	 = isset($_REQUEST['supplier_id'])?   			$_REQUEST['supplier_id'] :NULL;
		$name     		 = isset($_REQUEST['product_name'])?   			$_REQUEST['product_name'] :NULL;
		$price   		 = isset($_REQUEST['product_price'])? 			$_REQUEST['product_price']:NULL;
		$details  		 = isset($_REQUEST['other_product_details'])? 	$_REQUEST['other_product_details']:NULL;

		// Create the new product
			$products = $this->ProductsLogic->createProduct($type_code, $supplier, $name, $price, $details);
			if ($products > 0){
				$msg = "jhaaisgelukt";
		}
		else{
			$msg = "esniechgeluk";
		}
		echo "helllo";
		}	
		include 'view/productCreate.php';
    }
	public function collectReadProducts(){
		$data = $this->ProductsLogic->readProducts();
		$result = $this->TableLogic->createTable($data,"products",'product_id');
		include 'view/products.php';
    }
	public function collectReadProduct($id){
        $data = $this->ProductsLogic->readProduct($id);
		$result = $this->TableLogic->createTable($data,"products",'product_id');
		include 'view/products.php';
    }
	public function collectUpdateProduct($id) {

        $type       = isset($_REQUEST['product_type_code']) ?      $_REQUEST['product_type_code']   :NULL;
        $supplier   = isset($_REQUEST['supplier_id']) ?            $_REQUEST['supplier_id']  :NULL;
        $name       = isset($_REQUEST['product_name']) ?           $_REQUEST['product_name']  :NULL;
        $price      = isset($_REQUEST['product_price']) ?          $_REQUEST['product_price']  :NULL;
        $details    = isset($_REQUEST['other_product_details']) ?  $_REQUEST['other_product_details']  :NULL;

        if (isset($_REQUEST['submit'])) {
            $products = $this->ProductsLogic->updateProduct($id, $type, $supplier, $name, $price, $details);

        }
        $products = $this->ProductsLogic->readProduct($id);
        $res = $products->fetch(PDO::FETCH_NUM);
        [$id, $type, $supplier, $name, $price, $details] = $res;

        $operation = "?act=products&op=update&id=$id";
        include 'view/updateProducts.php';
    }
	public function collectDeleteProduct($id){
        $product = $this->ProductsLogic->deleteProduct($id);
        include 'view/delete.php';
	}
	public function __destruct(){

	}
	public function collectSearchProduct(){
        if ( isset($_REQUEST['submit']) ) {
            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] :NULL;
        } else 
        $msg = "esnichegluk";
        $data = $this->ProductsLogic->searchProduct($search);
        $result = $this->TableLogic->createTable($data,"products",'product_id');
    }
    public function collectReadPagedProducts($p){
        $res = $this->ProductsLogic->readAllProducts($p);
        $products = $this->TableLogic->createTable($res[0], "products", "product_id");
        $pages = $res[1];
        $pagebuttons = $this->TableLogic->createButtons($pages,"products");
        $msg = "Showing page {$p} of all Products";
        include 'view/listProducts.php';
	}

}


?>