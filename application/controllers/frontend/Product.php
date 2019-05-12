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
		
		$this->load->model(['product_model']);
	}

	/**
	 * View home glasess
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		$data['products'] = $this->product_model->getProduct();

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

}
