<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Slider model 
 */
class Banner_model extends CI_Model
{
    /**
     * update item banner
     * 
     * @param id banner    string
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id, $input)
    {   
        
        $this->db->where('id_banner', $id);
        $this->db->update('tbl_banner', $input);

        return $this->db->affected_rows();
    }

}