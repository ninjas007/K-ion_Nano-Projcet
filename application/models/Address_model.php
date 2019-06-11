<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Address Model 
 */
class Address_model extends CI_Model
{
    /**
     * update address
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($input)
    {   
        $this->db->where('id_address', 1);
        $this->db->update('tbl_address', $input);

        return $this->db->affected_rows();
    }

}