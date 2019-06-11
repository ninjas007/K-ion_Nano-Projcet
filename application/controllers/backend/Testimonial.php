<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

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
	 * View testimonial
	 *
	 * @return array
	 */
	public function index()
	{
		$this->load->view('backend/includes/header');
		$this->load->view('backend/home/index_testimonial');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get testimonial
	 *
	 * @return array
	 */
	public function get()
	{
		$this->load->model('testimonial_model');
		$offset = $this->input->get('limit');
		$result['data'] = $this->testimonial_model->getTestimonial($offset);
		$result['totalRows'] = $this->testimonial_model->totalRows();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add testimonial
	 *
	 * @return array
	 */
	public function add()
	{
		$this->load->model('testimonial_model');
		$image = $this->uploadImage();

        $data['message'] = '';
        
        if ($image['result'] == 'gagal') 
        {
        	$data['message'] = $image['data']['error'];

        	return $this->output
        			->set_content_type('application/json')
        			->set_output(json_encode($data));
        }
		
		$description = htmlentities($this->input->post('desc'));
		$customer = htmlentities($this->input->post('customer'));
		$image = $image['data']['upload_data']['file_name'];

		$input = [
            'desc_testimonial' => $description,
            'customer_by' => $customer,
            'date_modified' => date('Y-m-d'),
            'image_testimonial' => $image
        ];

		$result = $this->testimonial_model->add($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan testimonial';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan testimonial';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}

	/**
	 * update testimonial
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('testimonial_model');
		$data['message'] = "";

		if ($this->input->post('id') != NULL) {
			
			$tblTestimonial = $this->db->where('id_testimonial', $this->input->post('id'))->get('tbl_testimonials')->row_array();
			$imageHapus = $tblTestimonial['image_testimonial'];
			$image = $this->uploadImage();
			$failImage = '';

			if ($image['result'] == 'gagal') 
			{
				
				if ($tblTestimonial['image_testimonial'] != "")
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
			$description = htmlentities($this->input->post('desc'));
			$customer = htmlentities($this->input->post('customer'));

			$input = [
	            'desc_testimonial' => $description,
	            'customer_by' => $customer,
	            'date_modified' => date('Y-m-d'),
	            'image_testimonial' => $imageUpdate
	        ];

			$result = $this->testimonial_model->update($id, $input);
	        $data['message'] = '';
	        $data['status'] = '';

			if ($result > 0)
			{
				if ($imageHapus != $imageUpdate) {
					unlink('assets/template_frontend/images/testimonials/'.$imageHapus);
				}
				$data['message'] = 'Berhasil mengubah testimonial';	
				$data['status'] = TRUE;	
			}
			else
			{
				$data['message'] = "Gagal mengubah testimonial $failImage";
				$data['status'] = FALSE;	
			}
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
	public function uploadImage()
	{
		$config['upload_path'] 	 = './assets/template_frontend/images/testimonials/';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']      = 2048;
		$config['file_name'] 	 = sha1(date('YmdHis'));

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
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
	* Delete testimonial
	*
	*/
	public function delete()
	{
		$this->load->model('testimonial_model');
		$id = $this->input->post('id');

		if ($id != NULL) {
			$tblProduct = $this->db->where('id_testimonial', $id)->get('tbl_testimonials')->row_array();
			$imageHapus = $tblProduct['image_testimonial'];

			$result = $this->testimonial_model->delete($id);

			if ($result > 0) 
			{
				unlink('assets/template_frontend/images/testimonials/'.$imageHapus);
				$data['message'] = 'Berhasil mendelete testimonial';	
				$data['status'] = TRUE;	
			} 
			else 
			{
				$data['message'] = 'Gagal mendelete testimonial';
				$data['status'] = FALSE;
			}
			
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
