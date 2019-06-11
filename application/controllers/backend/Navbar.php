<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar extends CI_Controller {

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
		$this->load->view('backend/home/index_navbar');
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

		$result = $this->home_model->getNavbar();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add menu navbar
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function add()
	{
		$this->load->model('navbar_model');

        $this->load->library('form_validation');

		$name = $this->input->post('name');
		$link = $this->input->post('link');
        $data['message'] = '';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
	        return $this->output
	      	    ->set_content_type('application/json')
	      	    ->set_output(json_encode(['message' => validation_errors('', '')]));
        }
        else
        {
			$result = $this->navbar_model->addNavbar($name, $link);

			if ($result > 0) {
				$data['message'] = 'Berhasil menambah menu';	
			} else {
				$data['message'] = 'Gagal menambah menu';
			}

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
        }
		
	}

	/**
	 * Edit menu navbar
	 *
	 * get data sliders, banner, product from every models.
	 * @return array
	 */
	public function update()
	{
		$this->load->model('navbar_model');

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$link = $this->input->post('link');
		
		$result = $this->navbar_model->updateNavbar($id, $name, $link);
		
		if ($result > 0) {
			$data['message'] = 'berhasil mengedit menu';
		} else {
			$data['message'] = 'gagal mengedit menu';
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
	}

	/**
	 * Hapus menu navbar
	 *
	 * @return void
	 */
	public function hapus()
	{
		$this->load->model('navbar_model');

		$id = $this->input->post('id');
		$data['message'] = "";
		$result = $this->navbar_model->hapusNavbar($id);

		if ($result > 0) {
			$data['message'] = 'berhasil menghapus menu';
		} else {
			$data['message'] = 'gagal menghapus menu';
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
	}

}
