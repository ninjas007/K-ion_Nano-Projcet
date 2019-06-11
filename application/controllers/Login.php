<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Load model
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		//Do your magic here
	}

	/**
	 * View page login
	 *
	 */
	public function index()
	{
		if ($this->session->has_userdata('email')){
			redirect(base_url('backend/testimonial'));
		}

		$this->load->view('backend/index_login');
	}

	/**
	 * Redirect Login
	 *
	 */
	public function redirect()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$input = ['email' => $email, 'password' => $password];

		$result = $this->login_model->cek_login($input);

		if ($result == TRUE)
		{
			$data_session = [
				'email' => $email,
				'status' => "login"
			];

			$this->session->set_userdata($data_session);
			
			redirect(base_url('backend/testimonial'));
		} 
		else
		{
			$this->session->set_flashdata('error', 'Email Atau Password salah');
			redirect(base_url('login'));
		}
	}

	/**
	 * Logout admin
	 *
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
