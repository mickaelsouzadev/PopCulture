<?php  

class AdminData extends Admin
{

	public function __construct()
	{
		parent::__construct();	
	}

	public function inserctions()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('inserctions');
		$this->view->load('footer');
	}


	public function updates()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('updates');
		$this->view->load('footer');
	}

	public function deletes()
	{
		$this->view->load('header');
		$this->view->load('nav');
		$this->view->load('deletes');
		$this->view->load('footer');
	}
	

	

}