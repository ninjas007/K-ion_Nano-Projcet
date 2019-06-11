<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('backend/admin/index_profile');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * View edit admin
	 *
	 */
	public function update()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('passOld', 'Password Lama', 'required');
		$this->form_validation->set_rules('passNew', 'Password Baru', 'required');
		$this->form_validation->set_rules('passNew2', 'Konfirmasi Password', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$data['message'] = $this->form
	        $this->load->view('backend/admin/index_profile');
        }
        else
        {

        }

		$email = htmlentities($this->input->post('email'));
		$passOld = htmlentities($this->input->post('passOld'));
		$passNew = htmlentities($this->input->post('passNew'));
		$passNew2 = htmlentities($this->input->post('passNew2'));

		var_dump($email);
		die();
	}
}
