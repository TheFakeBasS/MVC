<?php
require_once 'model/DataHandler.php';
require_once 'model/TableLogic.php';

class ContactsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'mvc' ,'root' ,'');
	}

	public function createContact($name, $phone, $email, $address){
		$sql = "INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`) VALUES (NULL, '$name', '$phone', '$email', '$address');";
		echo $sql;
		$results = $this->DataHandler -> createData($sql);
		return $results;
	}

	public function readContacts(){
		$sql = 'SELECT * FROM contacts';
		$results = $this->DataHandler->readsData($sql);
		return $results;
	}

	public function readContact($id){
		$sql = 'SELECT  * FROM contacts WHERE id =' .$id;
		$result = $this->DataHandler->readData($sql);
		return $result;
	}

	public function updateContact($name, $phone, $email, $address, $id){

	}

	public function deleteContact($id){
        $sql = 'DELETE FROM contacts WHERE id ='. $id;
        $result = $this->DataHandler->deleteData($sql);
        return $result;
    }

}

