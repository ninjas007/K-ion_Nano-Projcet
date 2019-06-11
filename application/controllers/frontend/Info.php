<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	/**
	 * Magic method construct
	 *
	 * load parent and model
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');

	}

	/**
	 * View about
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		$header['navbars'] = $this->home_model->getNavbar();
		$header['marquee'] = $this->home_model->getMarquee();
				
		$data['address'] = $this->home_model->getAddress();
		$data['contacts'] = $this->home_model->getContacts();
		$data['rekenings'] = $this->home_model->getRekening();
		$data['couriers'] = $this->home_model->getKurir();

		$this->load->view('frontend/includes/header', $header);
		$this->load->view('frontend/info/index_info', $data);
		$this->load->view('frontend/includes/footer', $data);
		$this->load->view('frontend/includes/footer_about');
	}

}
