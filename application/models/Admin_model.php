<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Model 
 */
class Admin_model extends CI_Model
{
    /**
     * update admin
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($input)
    {   
        $this->db->where('id_admin', 1);
        $this->db->update('tbl_admin', $input);

        return $this->db->affected_rows();
    }

}