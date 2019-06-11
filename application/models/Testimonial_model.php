<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Testimonial model 
 */
class Testimonial_model extends CI_Model
{
    /**
    * get data testiomonial
    *
    * @param offset   number
    * 
    * @return data   array
    */
    public function getTestimonial($offset)
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonials');
        $this->db->limit(10, $offset);
        $this->db->order_by('id_testimonial', 'desc');

        return $this->db->get()->result_array();
    }

    /**
     * add testimonial
     * 
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function add($input)
    {   
        $this->db->insert('tbl_testimonials', $input);

        return $this->db->affected_rows();
    }

    /**
     * update testimonial
     * 
     * @param id testimonial    string
     * @param data input    array
     *
     * @return changed rows    number
     */
    public function update($id, $input)
    {   
        $this->db->where('id_testimonial', $id);
        $this->db->update('tbl_testimonials', $input);

        return $this->db->affected_rows();
    }

    /**
     * Delete testimonial
     * 
     * @param id testimonial    string
     *
     * @return changed rows    number
     */
    public function delete($id)
    {   
        $this->db->where('id_testimonial', $id);
        $this->db->delete('tbl_testimonials');

        return $this->db->affected_rows();
    }

    /**
    * total rows
    *
    * @return total rows   number
    */
    public function totalRows()
    {
        return $this->db->get('tbl_testimonials')->num_rows();
    }

}