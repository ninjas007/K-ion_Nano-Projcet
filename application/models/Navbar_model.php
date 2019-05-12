<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home model 
 */
class Navbar_model extends CI_Model
{
    /**
     * Update item navbar
     * 
     *  @return changed rows    number
     */
    public function updateNavbar($id, $name, $link)
    {
        $this->db->where('id_navbar', $id);
        $this->db->update('tbl_navbar', ['name_navbar' => $name, 'link_of_navbar' => $link]);

        return $this->db->affected_rows();
    }

    /**
     * add item navbar
     * 
     *  @return changed rows    number
     */
    public function addNavbar($name, $link = "")
    {
        $this->db->insert('tbl_navbar', ['name_navbar' => $name, 'link_of_navbar' => $link]);

        return $this->db->affected_rows();
    }

    /**
     * hapus item navbar
     * 
     *  @return changed rows    number
     */
    public function hapusNavbar($id)
    {   
        $this->db->where('id_navbar', $id);
        $this->db->delete('tbl_navbar');
        
        return $this->db->affected_rows();
    }
}