<?php
include_once 'classes/mpm_exception.php';
class Project_model extends CI_Model{
	
	private $_projects = array();
	
	public function __construct(){
		$this->db->select('*');
		$this->db->from('tts_projects');
		$query = $this->db->get();
		if($query != false){
			foreach ($query->result() as $value) {
				$this->_projects[$value->id] = $value->name;
			}
		}
	}
	
	public function create_project($project_name, $customer){

	}

	public function get_projects_for_employee($employee){
		$where = array('person' => $employee);
		$this->db->select('*');
		$this->db->from('tts_projects');
		$this->db->join('tts_project_person_assignments', 'tts_project_person_assignments.project = tts_projects.id', 'inner');
		$this->db->where($where);
		$query = $this->db->get();
		if($query != false){
			return $query->result();
		} else {
			throw new MPM_Exception('Dir sind keine Projekte zugewiesen');
		}
	}

	public function get_project_data_init(){
		
	}
	
	public function get_project_hours_init($employee){
		$dates = $this->init_dates();
		$returnArray = array();
		$where = array('tts_hours.employee' => $employee,
					   'tts_hours.date >=' 	=> $dates['beginDate'],
					   'tts_hours.date <=' 	=> $dates['endDate']);
		$this->db->select('*')->from('tts_hours');
		$this->db->where($where);
		$query = $this->db->get();
		if($query != false){
			foreach ($query->result() as $value) {
			 	$dateString = $this->mpm_calendar->format_date_for_user($value->date);
			 	$projectName = $this->_projects[$value->project];
				$returnArray[$dateString] = new ProjectHour($value->date, $value->hours, $value->project, $value->position, $projectName, $value->description);
			} 
			return $returnArray;
		} else {
			throw new MPM_Exception('Es wurden bisher keine Stunden erfasst');
		}
	}
	
	private function _assign_project_to_customer($project, $customer){
	
	}
	private function init_dates(){
		/*
		* We initialize the begin date to -2 Month and end date to + 1 week
		*/
		$today = new DateTime();
		$beginDate = clone $today;
		$this->mpm_calendar->subtract_from_date($beginDate, new DateInterval('P2M'));
		$beginDateString = $this->mpm_calendar->format_date_for_DataBase($beginDate);
		$endDate = clone $today;
		$this->mpm_calendar->add_to_date($endDate, new DateInterval('P1W'));
		$endDateString = $this->mpm_calendar->format_date_for_DataBase($endDate);
		return array('beginDate' => $beginDateString,
				     		 'endDate'   => $endDateString);
	}

}

class ProjectHour{
	
	private $_date;
	private $_hours;
	private $_project;
	private $_projectName;
	private $_position;
	private $_description;
	
	function __construct($date, $hours, $project, $position, $projectName, $description){
		$this->_description = $description;
		$this->_date = $date;
		$this->_project = $project;
		$this->_position = $position;
		$this->_hours = $hours;
		$this->_projectName = $projectName;
	}
	
	public function getHours(){
		return $this->_hours;
	}

	public function getPosition(){
		return $this->_position;
	}
	
	public function getDate(){
		return $this->_date;
	}
	
	public function getProjectNumber(){
		return $this->_project;
	}
	
	public function getDescription(){
		return $this->_description;
	}
	
	public function getProjectName(){
		return $this->_projectName;
	}
	
}