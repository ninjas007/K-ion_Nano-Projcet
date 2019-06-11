<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * View home glasess
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		$this->load->model('home_model');
		
		$header['navbars'] = $this->home_model->getNavbar();
		$header['marquee'] = $this->home_model->getMarquee();

		$data['sliders'] = $this->home_model->getSlider();
		$data['banners'] = $this->home_model->getBanner();
		$data['products'] = $this->home_model->getProduct();
		$data['testimonials'] = $this->home_model->getTestimonial();
		$data['categoryProducts'] = $this->home_model->getCategoryProducts();
		$data['descriptionToSell'] = $this->home_model->getDescriptionToSell();
		$data['couriers'] = $this->home_model->getKurir();

		$data['address'] = $this->home_model->getAddress();
		$data['contacts'] = $this->home_model->getContacts();

		$this->load->view('frontend/includes/header', $header);
		$this->load->view('frontend/home/index_home', $data);
		$this->load->view('frontend/includes/footer', $data);
		$this->load->view('frontend/includes/footer_home');
	}

}
