<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

	public function getUsers(){

		$query = "SELECT `users`.*, `users_roll`.`role`
					FROM `users` JOIN `users_roll`
					ON `users`.`role_id` = `users_roll`.`id`
				";

		return $this->db->query($query)->result_array();		

	}

}
