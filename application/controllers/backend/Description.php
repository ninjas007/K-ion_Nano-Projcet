<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Description extends CI_Controller {

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
	 * View description
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_description');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get description
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');

		$result = $this->home_model->getDescriptionToSell();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * update description
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('description_model');

		$input = [
			'header_description' => htmlentities($this->input->post('header')),
			'description' => $this->input->post('content'),
			'date_description' => date('Y-m-d')
		];

		$result = $this->description_model->update($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan description';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan description';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}


}
