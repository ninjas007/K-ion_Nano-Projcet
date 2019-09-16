<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * Magic method construct
	 *
	 * load parent and model
	 */
	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * View product
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->model('home_model');

		$header['navbars'] = $this->home_model->getNavbar();
		$header['marquee'] = $this->home_model->getMarquee();
		
		$data['products'] = $this->home_model->getProduct();
		$data['rekenings'] = $this->home_model->getRekening();
		$data['couriers'] = $this->home_model->getKurir();
		
		$data['contacts'] = $this->home_model->getContacts();
		$data['address'] = $this->home_model->getAddress();
		
		$this->load->view('frontend/includes/header', $header);
		$this->load->view('frontend/product/index_product', $data);
		$this->load->view('frontend/includes/footer', $data);
		$this->load->view('frontend/includes/footer_product');
	}

	/**
	 * Save data customer
	 *
	 * @return array
	 */
	public function simpanDataCustomer()
	{
		// filter string input to just number
		$telp = preg_replace('/[^0-9]/', '', $this->input->post('hp'));
		$telpFilter = substr($telp,0,1);
		
		if($telpFilter != '0') {
			$telpLen = strlen($telp); 
			$telp = '0'. substr($telp, 2, $telpLen);
		}
		

		$data = [
			'nama_customer' => $this->input->post('nama'),
			'nohp_customer' => $telp,
			'date_order' => date('Y-m-d'),
			'description_order' => $this->input->post('description'),
		];

		$this->db->insert('tbl_customer', $data);
	}

}
