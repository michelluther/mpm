<?php
/**
 * @author michel
 *
 */

include_once 'mpm_base_controller.php';

class Admin extends ML_Controller{

	public function __construct(){
		parent::__construct();
		$this->controller_name = strtolower(get_class($this));
	}

	public function submit_login(){
		parent::submit_login();
		$this->content['view'] = 'home';
		$this->content['data'] = null;
		$this->_callView();
	}
	
	public function create_user_init(){
		$this->load->view('create_user_input');
	}

	public function create_user_submit(){
		$uname = $_POST['uname'];
		$pw	= $_POST['pw'];
		$this->load->model('Project_hours_admin');
		$this->Project_hours_admin->create_user($uname, $pw);
		$return = array('msg_class' => 'msg_success',
										'msg_text'	=> 'Der User wurde erfolgreich angelegt');
		$this->load->view('system_feedback', $return);
	}

	public function display_users(){
		$this->load->model('Project_hours_admin');
	}
}
