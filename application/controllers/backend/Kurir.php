<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

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
		$this->load->view('backend/home/index_kurir');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get kurir
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');

		$result = $this->home_model->getKurir();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add kurir
	 *
	 * @return array
	 */
	public function add()
	{
		$this->load->model('kurir_model');

		$this->load->library('form_validation');

		$kurir = $this->input->post('kurir');
        $data['message'] = '';

        $this->form_validation->set_rules('kurir', 'kurir', 'required');

        if ($this->form_validation->run() == FALSE)
        {
	        return $this->output
	      	    ->set_content_type('application/json')
	      	    ->set_output(json_encode(['message' => validation_errors('', '')]));
        }
        else
        {

        	$input = [
        		'name_kurir' => $kurir,
        	];

			$result = $this->kurir_model->add($input);

			if ($result > 0) {
				$data['message'] = 'Berhasil menambah kurir';	
			} else {
				$data['message'] = 'Gagal menambah kurir';
			}

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
        }
	}

	/**
	 * update kurir
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('kurir_model');

		$this->load->library('form_validation');

		$id = $this->input->post('id');
		
		$data['message'] = '';

		if ($id != NULl) { 

			$kurir = $this->input->post('kurir');
	        $data['message'] = '';

	        $this->form_validation->set_rules('kurir', 'kurir', 'required');

	        if ($this->form_validation->run() == FALSE)
	        {
		        return $this->output
		      	    ->set_content_type('application/json')
		      	    ->set_output(json_encode(['message' => validation_errors('', '')]));
	        }
	        else
	        {
	        	$input = [
	        		'name_kurir' => $kurir,
	        	];

				$result = $this->kurir_model->update($id, $input);

				if ($result > 0) {
					$data['message'] = 'Berhasil mengubah kurir';	
				} else {
					$data['message'] = 'Gagal mengubah kurir';
				}

				return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($data));
	        }


		}
	}

	/**
	 * hapus kurir
	 *
	 * @return array
	 */
	public function hapus()
	{
		$this->load->model('kurir_model');

		$id = $this->input->post('id');

		$data['message'] = '';

		if ($id != NULl) {
			
			$result = $this->kurir_model->delete($id);	

			if ($result > 0) {
				$data['message'] = 'Berhasil menghapus kurir';	
			} else {
				$data['message'] = 'Gagal menghapus rekening';
			}
		
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
