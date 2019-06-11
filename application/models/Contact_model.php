<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contact Model 
 */
class Contact_model extends CI_Model
{
    /**
     * update contact
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($input)
    {   
        $this->db->where('id_contacts', 1);
        $this->db->update('tbl_contacts', $input);

        return $this->db->affected_rows();
    }

}