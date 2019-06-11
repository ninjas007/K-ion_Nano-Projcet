<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * kurir model 
 */
class Kurir_model extends CI_Model
{
    /**
     * add kurir
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function add($input)
    {   
        
        $this->db->insert('tbl_kurir', $input);

        return $this->db->affected_rows();
    }

    /**
     * update kurir
     * 
     * @param id    int
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id = NULL, $input)
    {   
        $this->db->where('id_kurir', $id);
        $this->db->update('tbl_kurir', $input);

        return $this->db->affected_rows();
    }

     /**
     * delete kurir
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function delete($id = NULL)
    {   
        $this->db->where('id_kurir', $id);
        $this->db->delete('tbl_kurir');

        return $this->db->affected_rows();
    }
}