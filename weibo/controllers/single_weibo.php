<?php 
Class single_weibo extends Front_Controller{
	public function __construct(){
		parent::__construct();
		$this->data['title'] = 'airzhe的微博';
		$this->data['body_class'] = 'home';
	}
	public function index(){
		$this->view('single_weibo',$this->data);
	}
}
