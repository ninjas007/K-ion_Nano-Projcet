<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home model 
 */
class Home_model extends CI_Model
{
	/**
     * Get data marquee
     *
     * @return array
     */
    public function getMarquee()
    {
    	return $this->db->get('tbl_marquee')->row_array();
    }

	/**
     * Get navbar
     * 
     *  @return array
     */
    public function getNavbar()
    {
        return $this->db->get('tbl_navbar')->result_array();
    }

	/**
     * Get data slider
     * 
     *  @return array
     */
    public function getSlider()
    {
        return $this->db->get('tbl_slider')->result_array();
    }

    /**
     * Get data banner
     *
     * @return array
     */
    public function getBanner()
    {
        return $this->db->get('tbl_banner')->result_array();
    }

    /**
     * Get data product
     *
     * @return array
     */
    public function getProduct()
    {
        return $this->db->get('tbl_products')->result_array();
    }

    /**
     * Get data Countdown
     *
     * @return array
     */
    public function getCountdown()
    {
        return $this->db->get('tbl_countdown')->row_array();
    }

     /**
     * Get data Testimonial
     *
     * @return array
     */
    public function getTestimonial()
    {
        return $this->db->get('tbl_testimonials')->result_array();
    }

    /**
     * Get data category products
     *
     * @return array
     */
    public function getCategoryProducts()
    {
        return $this->db->get('category_products')->result_array();
    }

    /**
     * Get data description of the sell
     *
     * @return array
     */
    public function getDescriptionToSell()
    {
        return $this->db->get('tbl_description_sell')->row_array();
    }

 	/**
 	* Get data address
	*
 	* @return array
 	*/
    public function getAddress()
    {
        return $this->db->get('tbl_address')->row_array();
    }

    /**
     * Get data contacts
     *
     * @return array
     */
    public function getContacts()
    {
    	return $this->db->get('tbl_contacts')->row_array();
    }

}