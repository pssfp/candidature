<?php

class Page extends MY_Controller{
    public function index()
	{
		$this->load->view('template/header');
		$this->load->view('start');
		$this->load->view('template/footer');
	}
	public function about()
	{
		$this->load->view('template/header');
		$this->load->view('about');
		$this->load->view('template/footer');
	}
	public function contact()
	{
		$this->load->view('template/header');
		$this->load->view('contact');
		$this->load->view('template/footer');
	}
}
?>