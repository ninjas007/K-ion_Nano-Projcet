<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marquee_model extends CI_Model {

	/**
	* Save marquee
	*
	* @param marque text    string
	*
	* @return changed rows   number
	*/
	public function saveMarquee($marquee, $status)
	{
		if ($marquee == "") {
			$marquee = $this->db->where('id_marquee', 1)->get('tbl_marquee')->row_array();
			$marquee = $marquee['marquee'];
		}

		$this->db->where('id_marquee', 1);
		$this->db->update('tbl_marquee', ['marquee' => $marquee, 'not_activate' => $status] );

		return $this->db->affected_rows();
	}

}
