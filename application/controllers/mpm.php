<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'mpm_base_controller.php';

class Mpm extends ML_Controller{

	public function __construct(){
		parent::__construct();
		
	}

	public function submit_login(){
		parent::submit_login();
		$this->content['view'] = 'home';
		$this->content['data'] = null;
		$this->_callView();
	}
	
	public function home(){
		$this->content['view'] = 'home';
		$this->content['data'] = null;
		$this->_callView();
	}

	public function maintain_hours_personal(){
		$projectHours = $this->Project_model->get_project_hours_init($this->user->personal_id);
		$calendarEntries = $this->mpm_calendar->get_calendar_days('01.01.2011', '31.12.2011');
		$this->content['view'] = 'main_hours_pers_init';
		$this->content['data']['calendarEntries'] = $calendarEntries;
		$this->content['data']['projectHours'] = $projectHours;
		$this->_callView();
	}
	
	public function create_new_hour_entry(){
		$this->	load->view('create_new_hour_entry');
	}
	
	public function project_work(){
		$this->content['view'] = 'project_work_init';
		$this->content['data'] = array('projects' => $this->Project_model->get_projects_for_employee($this->user->personal_id));
		$this->_callView();
	}
	
	public function init_project_data_ajax(){
		$this->content['data']['projectData'] =  $this->Project_model->get_project_data_init();
	}
	
}
