<?php 
Class home extends Front_Controller{
	public function __construct(){
		parent::__construct();
		$this->data['title'] = 'airzhe的微博|';
		$this->data['body_class'] = 'home';
	}
	public function index(){
		$this->view('home',$this->data);
	}
}