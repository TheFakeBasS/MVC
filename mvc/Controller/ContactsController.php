<?php
require_once 'model/ContactsLogic.php';
require_once 'model/TableLogic.php';
class ContactsController{

	public function __construct() {
		$this->ContactsLogic = new ContactsLogic();
		$this->TableLogic = new TableLogic();
	}

	public function handleRequest()
	{
		try {
			$op = isset($_REQUEST['op'])?$_REQUEST['op']:NULL;
			switch ($op) {
				case 'create':
				$this->collectCreateContact();
				break;
				case 'reads':
				$this->collectReadContacts();
				break;
				case 'read':
				$this->collectReadContact($_REQUEST['id']);
				break;
				case 'update':
				$this->collectUpdateContact();
				break;
				case 'delete':
				$this->collectDeleteContact($_REQUEST['id']);
				break;
				default:
				$this->collectReadContacts();
				break;
			}
		} catch (ValidationException $e) {
				$errors = $e->getErrors();

		}

	}

	public function collectCreateContact(){
		// Check if a form has been submitted
		if ( isset($_REQUEST['submit']) ) {

		// Collect params if entered
		// Validate and sanitize params
		$name       = isset($_REQUEST['name']) ?   $_REQUEST['name']  :NULL;
		$phone      = isset($_REQUEST['phone'])?   $_REQUEST['phone'] :NULL;
		$email      = isset($_REQUEST['email'])?   $_REQUEST['email'] :NULL;
		$address    = isset($_REQUEST['address'])? $_REQUEST['address']:NULL;

		// Create the new contact
			$contacts = $this->ContactsLogic->createContact($name, $phone, $email, $address);
			if ($contacts > 0){
				$msg = "jhaaisgelukt";
		}
		else{
			$msg = "esniechgeluk";
		}
		}	

		// If no form has been submitted show empty form
		// If query has been executed show feedback message

		include 'view/create.php';
	}

	public function collectReadContacts(){
		$data = $this->ContactsLogic->readContacts();
		$result = $this->TableLogic->createTable($data,"contacts",'id');
		include 'view/reads.php';
	}

	public function collectReadContact($id){
        $data = $this->ContactsLogic->readContact($id);
		$result = $this->TableLogic->createTable($data,"contacts",'id');
		include 'view/read.php';
		
	}

	public function collectUpdateContact(){
		// $contact = $this->ContactsLogic->readContact();
		// var_dump($contact);
		// Check if a form has been submitted
		if ( isset($_REQUEST['submit']) ) {

		// Collect params if entered
		// Validate and sanitize params
		$name       = isset($_REQUEST['name']) ?   $_REQUEST['name']  :NULL;
		$phone      = isset($_REQUEST['phone'])?   $_REQUEST['phone'] :NULL;
		$email      = isset($_REQUEST['email'])?   $_REQUEST['email'] :NULL;
		$address    = isset($_REQUEST['address'])? $_REQUEST['address']:NULL;

		// Create the new contact
			$contacts = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $address);
			
		// Create feedback msg
		if ($contacts > 0){
				$msg = "jhaaisgelukt";
		}
		else{
			$msg = "esniechgeluk";
		}
		// $msg = "$rowcount contact(s) updated"
			$this->collectCreateContact($id);

		// If no form was submitted show prefilled form	
		    $contacts = $this->ContactsLogic->readContact($id);
			$res = $contacts->fetch(PDO::FETCH_NUM);
			[$id, $name, $phone, $email, $address] = $res;

		// If query has been executed show feedback message
			$msg = "Edit this contact";
			$operation = "update&id=$id";
		include 'view/update.php';
	}
}

	public function collectDeleteContact($id){
        $contacts = $this->ContactsLogic->deleteContact($id);
        include 'view/delete.php';
	}
	public function __destruct(){

	}

}

?>