<?php
	namespace App\Core;
	class BaseResponse {
		public $is_success;
		public $data;
		public $message;
		public $errors;
		public function __construct(){
			$this->is_success=false;
			$this->data=null;
			$this->message="Validator Error";
			$this->errors=null;
		}

	}

?>