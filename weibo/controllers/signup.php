<?php 
/**
 * 用户注册页面
 */
Class signup extends Front_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		if($this->input->post()){
			// php端表单字段验证
			$this->load->model('User_info_model');
			$this->load->library('form_validation');
			$rules = array_merge($this->User_model->rules,$this->User_info_model->rules);
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('is_natural_no_zero', '%s 字段不完整');
			if ($this->form_validation->run() == TRUE) {
				// 获取注册账户密码
				$user_data=$this->array_from_post(array('account','passwd'));
				$user_data['passwd']=$this->User_model->hash($user_data['passwd']);
				// 获得用户个人信息
				$user_info_data=$this->array_from_post(array('username','birthday','sex','location'));
				$user_info_data['birthday']=$user_info_data['birthday'][0].'-'.$user_info_data['birthday'][1].'-'.$user_info_data['birthday'][2];
				$user_info_data['location']=serialize($user_info_data['location']);
				//用户注册信息写入数据库
				if($uid=$this->User_model->add($user_data)){
					$user_info_data['uid']=$uid;
					$this->User_info_model->add($user_info_data);
					success('注册成功...','home');
				};
				
			}else{
				echo (validation_errors()); 
			}
		}else{
			// session_id() || session_start();
			// var_dump($_SESSION);
			$this->partial('signup');
		}
	}


	/**
	 * 生成验证码
	 */
	public function code(){
		session_id() || session_start();
		$this->load->library('code');
		$this->code->height=35;
		$this->code->font_size=24;
		$this->code->font='./assets/data/Quickie.ttf';
		$this->code->show();
	}
	/**
	 * 验证验证码
	 */
	public function auth_code(){
		session_id() || session_start();
		$code=$this->input->post('code');
		if(strtoupper($code)!=$_SESSION['code']){
			die('false');
		}else{
			die('true');
		}
	}
	/**
	 * 验证帐号是否存在
	 */
	public function account_exist(){
		$data=$this->input->post();
		$arr=$this->User_model->get_by($data);
		//如果为真,则记录存在
		if(empty($arr)){
			die('true');
		}else{
			die('false');
		}
	}
	/**
	 * 验证昵称是否存在
	 */
	public function username_exist(){
		$data=$this->input->post();
		$this->load->model('User_info_model');
		$arr=$this->User_info_model->get_by($data);
		//如果为真,则记录存在
		if(empty($arr)){
			die('true');
		}else{
			die('false');
		}
	}
	/**
	* 昵称正则验证
	*/
	public function username_check($value){
		$preg='@^[a-zA-Z0-9_\-\x{4e00}-\x{9fa5}]+$@u';
		if(!preg_match($preg, $value)){
			$this->form_validation->set_message('username_check', '%s 字段格式不正确');
			return false;
		}else{
			return true;
		}
	}
	/**
	* 所在地验证
	*/
	public function location_check($value){
		if(!$value){
			$this->form_validation->set_message('location_check', '%s 字段不完整');
			return false;
		}else{
			return true;
		}
	}
}
