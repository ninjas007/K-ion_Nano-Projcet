<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	// List all your items
	public function get( $offset = 0 )
	{
		$this->db->select('id_customer, nama_customer, nohp_customer, date_order, description_order');
		$this->db->select("GROUP_CONCAT(description_order SEPARATOR ' <br> ') AS description");
		$this->db->select("GROUP_CONCAT(date_order SEPARATOR ' <br> ') AS date");
		$this->db->from('tbl_customer');
		$this->db->group_by('nohp_customer');

		return $this->db->get()->result_array();

	}
}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */