<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
	 * View contact
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_contact');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get contact
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');
		$result = $this->home_model->getContacts();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * update contact
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('contact_model');

		$input = [
			'no_whatsapp' => $this->input->post('contact'),
			'date_modified' => date('Y-m-d')
		];

		$result = $this->contact_model->update($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan contact';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan contact';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}


}
