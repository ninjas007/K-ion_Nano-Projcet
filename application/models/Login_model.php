<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_login($input)
	{
		$admin = $this->db->get_where('tbl_admin')->row_array();

		if (password_verify($input['password'], $admin['password_admin']) && $admin['email_admin'] == $input['email'])
		{
			
			return TRUE;
		} 
		else
		{
			return FALSE;
		}
	}
}
