<?php

/**
 * 
 */
class Index extends Controller
{
	function __construct()
	{
		parent::__construct();
		Auth::handleAdminLogin();
	}

	function index()
	{
		$this->view->render('index/index');
	}

	function logout()
	{
		Session::destroy();
		header('location: ../login');
		exit();
	}
}
