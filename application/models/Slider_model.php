<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Slider model 
 */
class Slider_model extends CI_Model
{
    /**
     * add item slide
     * 
     * @param data input    array
     * 
     * @return changed rows    number
     */
    public function add($input)
    {   
        $this->db->insert('tbl_slider', $input);

        return $this->db->affected_rows();
    }


    /**
     * update item slide
     * 
     * @param id slide    string
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id, $input)
    {   
        
        $this->db->where('id_slider', $id);
        $this->db->update('tbl_slider', $input);

        return $this->db->affected_rows();
    }


    /**
     * Delete item slide
     * 
     * @param id slide    string
     * 
     * @return changed rows    number
     */
    public function delete($id)
    {   
        $this->db->where('id_slider', $id);
        $this->db->delete('tbl_slider');

        return $this->db->affected_rows();
    }

}