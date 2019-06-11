<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description Model 
 */
class Description_model extends CI_Model
{
    /**
     * update description sell
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($input)
    {   
        $this->db->where('id_description', 1);
        $this->db->update('tbl_description_sell', $input);

        return $this->db->affected_rows();
    }

}