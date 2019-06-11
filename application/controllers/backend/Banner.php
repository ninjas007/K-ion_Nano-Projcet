<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

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
		$this->load->view('backend/home/index_banner');
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
		$result = $this->home_model->getBanner();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}


	/**
	 * update banner
	 *
	 * @return array
	 */
	public function update()
	{

		$this->load->model('banner_model');

		$tblBanner = $this->db->where('id_banner', $this->input->post('id'))->get('tbl_banner')->row_array();
		$imageHapus = $tblBanner['img_banner'];
		$image = $this->uploadImg();
		$failImage = '';

		if ($image['result'] == 'gagal') 
		{
			
			if ($tblBanner['img_banner'] != "")
			{
				$imageUpdate = $imageHapus;
			}

			$failImage = $image['data']['error'];

		}		
		else
		{
			$imageUpdate = $image['data']['upload_data']['file_name'];
		}

		$id = $this->input->post('id');
		$textButton = htmlentities($this->input->post('textButton'));
		$statusButton = $this->input->post('statusButton');
		$linkButton = htmlentities($this->input->post('linkButton'));

		$input = [
		    'img_banner' => $imageUpdate,
		    'name_banner' => htmlentities($textButton),
		    'not_activated' => $statusButton,
		    'link_to_banner' => strtolower($linkButton),
		];

		$result = $this->banner_model->update($id, $input);
        $data['message'] = '';
        $data['status'] = '';

		if ($result > 0)
		{
			if ($imageHapus != $imageUpdate) {
				unlink('assets/template_frontend/images/banner/'.$imageHapus);
			}
			$data['message'] = 'Berhasil mengubah banner';	
			$data['status'] = TRUE;	
		}
		else
		{
			$data['message'] = "Gagal mengubah banner $failImage";
			$data['status'] = FALSE;	
		}

		$this->output
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
		$config['upload_path'] 	 = './assets/template_frontend/images/banner/';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']      = 2048;
        // $config['max_width']     = 2048;
        // $config['max_height']    = 768;
		$config['file_name'] 	 = sha1(date('YmdHis'));

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
