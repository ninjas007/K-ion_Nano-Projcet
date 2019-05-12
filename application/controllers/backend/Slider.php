<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	/**
	 * Magic method construct
	 *
	 * load parent and model
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['home_model', 'slider_model']);

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
		$this->load->view('backend/home/index_slider');
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
		$result = $this->home_model->getSlider();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add slider
	 *
	 * @return array
	 */
	public function add()
	{
        $this->load->library('form_validation');
        // echo '<pre>';
        // var_dump($this->input->post());
        // die();
        
        $image = $this->uploadImg();

        $data['message'] = '';
        
        if ($image['result'] == 'gagal') 
        {
        	$data['message'] = $image['data']['error'];

        	return $this->output
        			->set_content_type('application/json')
        			->set_output(json_encode($data));
        }
		
		$header = htmlentities($this->input->post('header'));
		$c_header = $this->input->post('c_header');
		$desc = htmlentities($this->input->post('description'));
		$c_desc = $this->input->post('c_desc');
		$link = htmlentities($this->input->post('linkButton'));
		$statusBtn = $this->input->post('displayButton');
		$textButton = htmlentities($this->input->post('textButton'));
		$image = $image['data']['upload_data']['file_name'];

		$input = [
            'header_slider' => $header,
            'color_header' => $c_header,
            'desc_slider' => $desc,
            'color_desc' => $c_desc,
            'link_to_slider' => strtolower($link),
            'name_to_link' => $textButton,
            'display_button' => $statusBtn,
            'image_slider' => $image,
        ];

		$result = $this->slider_model->add($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan slide';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan slide';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}

	/**
	 * update slider
	 *
	 * @return array
	 */
	public function update()
	{

		$tblSlider = $this->db->where('id_slider', $this->input->post('id'))->get('tbl_slider')->row_array();
		$imageHapus = $tblSlider['image_slider'];
		$image = $this->uploadImg();
		$failImage = '';

		if ($image['result'] == 'gagal') 
		{
			
			if ($tblSlider['image_slider'] != "")
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
		$header = htmlentities($this->input->post('header'));
		$c_header = $this->input->post('c_header');
		$desc = htmlentities($this->input->post('desc'));
		$c_desc = $this->input->post('c_desc');
		$link = htmlentities($this->input->post('linkButton'));
		$textButton = htmlentities($this->input->post('textButton'));
		$statusBtn = $this->input->post('displayButton');

		$input = [
		    'header_slider' => $header,
		    'color_header' => $c_header,
		    'desc_slider' => $desc,
		    'color_desc' => $c_desc,
		    'link_to_slider' => strtolower($link),
		    'name_to_link' => $textButton,
		    'display_button' => $statusBtn,
		    'image_slider' => $imageUpdate,
		];

		$result = $this->slider_model->update($id, $input);
        $data['message'] = '';
        $data['status'] = '';

		if ($result > 0)
		{
			if ($imageHapus != $imageUpdate) {
				unlink('assets/template_frontend/images/slider/'.$imageHapus);
			}
			$data['message'] = 'Berhasil mengubah slide';	
			$data['status'] = TRUE;	
		}
		else
		{
			$data['message'] = "Gagal mengubah slide $failImage";
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
		$config['upload_path'] 	 = './assets/template_frontend/images/slider/';
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

	/**
	* Delete slide
	*
	*/
	public function delete()
	{
		$id = $this->input->post('id');
		$tblSlider = $this->db->where('id_slider', $id)->get('tbl_slider')->row_array();
		$imageHapus = $tblSlider['image_slider'];

		$result = $this->slider_model->delete($id);

		if ($result > 0) 
		{
			unlink('assets/template_frontend/images/slider/'.$imageHapus);
			$data['message'] = 'Berhasil mendelete slide';	
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal mendelete slide';
			$data['status'] = FALSE;
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
