<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product model 
 */
class Product_model extends CI_Model
{
    /**
     * add product
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function add($input)
    {   
        
        $this->db->insert('tbl_products', $input);

        return $this->db->affected_rows();
    }

    /**
     * update product
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id, $input)
    {   
        $this->db->where('id_product', $id);
        $this->db->update('tbl_products', $input);

        return $this->db->affected_rows();
    }

     /**
     * delete product
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function delete($id)
    {   
        $this->db->where('id_product', $id);
        $this->db->delete('tbl_products');

        return $this->db->affected_rows();
    }
}