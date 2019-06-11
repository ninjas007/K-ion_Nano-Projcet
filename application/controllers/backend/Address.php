<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

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
	 * View address
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_address');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get address
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');
		$result = $this->home_model->getAddress();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * update address
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('address_model');

		$input = [
			'desc_address' => $this->input->post('content'),
			'date_modified' => date('Y-m-d')
		];

		$result = $this->address_model->update($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan address';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan address';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}


}
