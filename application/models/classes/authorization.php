<?php

class Authorization{
	
	/*
	 * Constants:
	 * 	Authorizable activities
	 */
	
	const CREATE_USER 	 = 'create_user';
	const MANAGE_PROJECT = 'manage_project';
	
	
	public static function check_authorization($user, $action, $target = NULL){
		return true;
		// throw new Exception('Du bist nicht autorisiert');
	}
	
}