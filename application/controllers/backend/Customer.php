<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	/**
	 * Magic method construct
	 *
	 * load parent and model
	 */
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

	}

	/**
	 * View testimonial
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->model('customer_model');
		$data['customers'] = $this->customer_model->get();
	
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_customer', $data);
		$this->load->view('backend/includes/footer');
	}
}