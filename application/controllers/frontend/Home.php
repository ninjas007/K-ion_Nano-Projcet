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
		
		$this->load->model(['home_model']);
	}

	/**
	 * View home glasess
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		$data['navbars'] = $this->home_model->getNavbar();
		$data['sliders'] = $this->home_model->getSlider();
		$data['banners'] = $this->home_model->getBanner();
		$data['products'] = $this->home_model->getProduct();
		$data['countdown'] = $this->home_model->getCountdown();
		$data['testimonials'] = $this->home_model->getTestimonial();
		$data['categoryProducts'] = $this->home_model->getCategoryProducts();
		$data['descriptionToSell'] = $this->home_model->getDescriptionToSell();
		$data['address'] = $this->home_model->getAddress();
		$data['contacts'] = $this->home_model->getContacts();
		$data['marquee'] = $this->home_model->getMarquee();

		$this->load->view('frontend/includes/header');
		$this->load->view('frontend/home/index_home', $data);
		$this->load->view('frontend/includes/footer');
	}

	public function product()
	{
		$this->load->view('frontend/product/index_product');
	}

	public function detail()
	{
		$this->load->view('frontend/product/detail_product');
	}

	public function testimonial()
	{
		$categoryId = $this->input->post('categoryIdTestimonial');

		$data = $this->testimonial_model->getTestimonial($categoryId);

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
