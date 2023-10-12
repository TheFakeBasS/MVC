<?php
require_once 'Controller\ContactsController.php';
require_once 'Controller\ProductsController.php';
class MainController{

	public function __construct() {
		$this->ContactsController = new ContactsController();
		$this->ProductsController = new ProductsController();
	}

    public function handleRequest()
	{
		try {
			$act = isset($_REQUEST['act'])?$_REQUEST['act']:NULL;
			switch ($act) {
                case 'contacts';
                $this->ContactsController->handleRequest();
				break;
                case 'products';
                $this->ProductsController->handleRequest();
				break;
				default:
				$this->ProductsController->handleRequest();
				break;
			}
		} catch (ValidationException $e) {
				$errors = $e->getErrors();

		}

    }
}
?>