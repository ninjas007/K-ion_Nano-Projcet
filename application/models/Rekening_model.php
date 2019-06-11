<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Rekening model 
 */
class Rekening_model extends CI_Model
{
    /**
     * add rekening
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function add($input)
    {   
        
        $this->db->insert('tbl_rekening', $input);

        return $this->db->affected_rows();
    }

    /**
     * update rekening
     * 
     * @param id    int
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id = NULL, $input)
    {   
        $this->db->where('id_rekening', $id);
        $this->db->update('tbl_rekening', $input);

        return $this->db->affected_rows();
    }

     /**
     * delete rekening
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function delete($id = NULL)
    {   
        $this->db->where('id_rekening', $id);
        $this->db->delete('tbl_rekening');

        return $this->db->affected_rows();
    }
}