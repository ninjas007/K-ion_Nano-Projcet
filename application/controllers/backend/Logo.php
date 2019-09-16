<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller {

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
	 * View logo
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_logo');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * update logo
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->library('session');
		$image = $this->uploadImg();

		if ($image['result'] == 'berhasil')
		{
			$data['message'] = 'Berhasil menyimpan logo';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan logo'. $image['data']['error'];
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}


	/**
	 * proccess file upload
	 *
	 * @return data image if berhasil , message if gagal
	 */
	public function uploadImg()
	{
		unlink(FCPATH.'assets/template_frontend/images/logo/logo.jpg');

		$config['upload_path'] 	 = './assets/template_frontend/images/logo/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = 2048;
        $config['max_width']     = 120;
        $config['max_height']    = 27;
		$config['file_name'] 	 = 'logo.jpg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());

            return ['result' => 'gagal', 'data' => $error];
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            return ['result' => 'berhasil', 'data' => $data];
        }
		
	}

}
