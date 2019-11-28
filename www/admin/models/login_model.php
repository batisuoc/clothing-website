<?php

/**
 * 
 */
class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$result = $this->db->select(
			"SELECT * FROM account WHERE username = :username AND pass = :password",
			array(
				'username' => $_POST['username'],
				'password' => $_POST['password']/*Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)*/
			)
		);
		if ($result != false) {
			Session::init();
			//Neu da dang nhap thi gan mot bien session co gia tri bang true
			Session::set('adminLoggedIn', true);
			header('location: ../index');
		} else {
			header('location: ../login');
		}
	}
}
