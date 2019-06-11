<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
		
		$data['descriptionToSell'] = $this->home_model->getDescriptionToSell();
		
		$footer['address'] = $this->home_model->getAddress();
		$footer['contacts'] = $this->home_model->getContacts();

		$this->load->view('frontend/includes/header', $header);
		$this->load->view('frontend/about/index_about', $data);
		$this->load->view('frontend/includes/footer', $footer);
		$this->load->view('frontend/includes/footer_about');
	}

}
