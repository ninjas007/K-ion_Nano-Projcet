<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

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

		$this->load->model('rekening_model');

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
		$this->load->view('backend/home/index_rekening');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get rekening
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');
		$result = $this->home_model->getRekening();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add rekening
	 *
	 * @return array
	 */
	public function add()
	{

		$this->load->library('form_validation');

		$bank = $this->input->post('bank');
		$nama = $this->input->post('nama');
		$rekening = $this->input->post('rekening');
        $data['message'] = '';

        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('rekening', 'Rekening', 'required');

        if ($this->form_validation->run() == FALSE)
        {
	        return $this->output
	      	    ->set_content_type('application/json')
	      	    ->set_output(json_encode(['message' => validation_errors('', '')]));
        }
        else
        {

        	$input = [
        		'nama_bank' => $bank,
        		'atas_nama' => $nama,
        		'no_rekening' => $rekening,
        	];

			$result = $this->rekening_model->add($input);

			if ($result > 0) {
				$data['message'] = 'Berhasil menambah rekening';	
			} else {
				$data['message'] = 'Gagal menambah rekening';
			}

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
        }
	}

	/**
	 * update rekening
	 *
	 * @return array
	 */
	public function update()
	{

		$this->load->library('form_validation');

		$id = $this->input->post('id');
		
		$data['message'] = '';

		if ($id != NULl) { 

			$bank = $this->input->post('bank');
			$nama = $this->input->post('nama');
			$rekening = $this->input->post('rekening');
	        $data['message'] = '';



	        $this->form_validation->set_rules('bank', 'Bank', 'required');
	        $this->form_validation->set_rules('nama', 'Nama', 'required');
	        $this->form_validation->set_rules('rekening', 'Rekening', 'required');

	        if ($this->form_validation->run() == FALSE)
	        {
		        return $this->output
		      	    ->set_content_type('application/json')
		      	    ->set_output(json_encode(['message' => validation_errors('', '')]));
	        }
	        else
	        {
	        	$input = [
	        		'nama_bank' => $bank,
	        		'atas_nama' => $nama,
	        		'no_rekening' => $rekening,
	        	];

				$result = $this->rekening_model->update($id, $input);

				if ($result > 0) {
					$data['message'] = 'Berhasil mengubah rekening';	
				} else {
					$data['message'] = 'Gagal mengubah rekening';
				}

				return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($data));
	        }


		}
	}

	/**
	 * hapus rekening
	 *
	 * @return array
	 */
	public function hapus()
	{
		$id = $this->input->post('id');

		$data['message'] = '';

		if ($id != NULl) {
			
			$result = $this->rekening_model->delete($id);	

			if ($result > 0) {
				$data['message'] = 'Berhasil menghapus rekening';	
			} else {
				$data['message'] = 'Gagal menghapus rekening';
			}
		
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
