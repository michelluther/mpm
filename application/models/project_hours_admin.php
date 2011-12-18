<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
include_once 'classes/authorization.php';

class Project_hours_admin extends CI_Model{



	/*
	 * ****************************
	 * User Management
	 * ****************************
	 */
	public function create_user($uname, $pw){
		$this->mpm_authorization->check_authorization($this->session->userdata('user_id'), Authorization::CREATE_USER );
		$pw_array = $this->_create_hash_array($pw);
		$user_data = array(	'uname' 		=> $uname,
							'password' 		=> $pw_array['pw_hash'],
							'salt'			=> $pw_array['salt'] );
		$result = $this->db->insert('tts_user', $user_data);
		if ($result == false){
			throw new Exception('User konnte nicht angelegt werden');
		}
	}

	public function get_users(){
		$this->db->select('user');
		$query = $this->db->get();

	}


	public function assign_role_to_user($uname, $role){

	}

	public function lock_user($user){

	}
	/*
	 * ****************************
	 * Personal Management
	 * ****************************
	 */
	public function create_person($pernr, $first_name, $last_name){

	}

	public function assign_user_to_person($pernr, $uname){

	}
	/*
	 * ****************************
	 * Authorization Management
	 * ****************************
	 */
	public function create_role($role_name){

	}

	public function assign_permission_to_role($role, $permission){

	}

	public function remove_permission_from_role($role, $permission){

	}

	private function _is_authorized(){
		return TRUE;
	}

	private function _create_salt(){
		$salt = mt_rand();
		return $salt;
	}

	private function _create_hash_array($pw){
		$salt = $this->_create_salt();
		$hash = md5($pw . $salt);
		$security_data = array( 'pw_hash' 	=> $hash,
								'salt'		=> $salt );
		return $security_data;
	}
}
