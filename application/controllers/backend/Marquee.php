<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marquee extends CI_Controller {

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
	 * View about
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_marquee');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get menu navbar
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');
		$result = $this->home_model->getMarquee();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * save marquee
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function save()
	{
		$this->load->model('marquee_model');
        $this->load->library('form_validation');

		$marquee = $this->input->post('marquee');
		$status = $this->input->post('status');

        $data['message'] = '';
		$result = $this->marquee_model->saveMarquee($marquee, $status);

		if ($result > 0) {
			$data['message'] = 'Berhasil menyimpan settingan';	
		} else {
			$data['message'] = 'Gagal menyimpan settingan';
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
		
	}

}
