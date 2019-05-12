<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * View about
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		// $data['products'] = $this->about_model->get();

		$this->load->view('backend/includes/header');
		$this->load->view('backend/dashboard/index_dashboard');
		$this->load->view('backend/includes/footer');
	}

}
