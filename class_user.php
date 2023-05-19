<?php 

    class user {
		
		public $email;
		public $username;
		private $password ='';
		public $birth_date;
		public $mailing_list;
		
		function __construct($email,$username, $birth_date, $mailing_list){
			$this->email = $email;
			$this->username = $username;
			$this->birth_date = $birth_date;
			$this->mailing_list = $mailing_list;
		}
		
		function set_password($password){
			$this->password = $password;
		}
		
		function leer_password(){
			return $this->password;
		}
		
	}
?>
