<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->view('backend/home/index_product');
		$this->load->view('backend/includes/footer');
	}

	/**
	 * get product
	 *
	 * get data product
	 * @return array
	 */
	public function get()
	{
		$this->load->model('home_model');

		$result = $this->home_model->getProduct();

		return $this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));
	}

	/**
	 * add product
	 *
	 * @return array
	 */
	public function add()
	{
		$this->load->model('product_model');

		$image = $this->uploadImage();

        $data['message'] = '';
        
        if ($image['result'] == 'gagal') 
        {
        	$data['message'] = $image['data']['error'];

        	return $this->output
        			->set_content_type('application/json')
        			->set_output(json_encode($data));
        }
		
		$name = htmlentities($this->input->post('name'));
		$price = $this->input->post('price');
		$label = $this->input->post('label');
		$image = $image['data']['upload_data']['file_name'];

		$input = [
            'name_product' => $name,
            'price_product' => $price,
            'img_product_1' => $image,
            'label_product' => $label,
            'date_input' => date('Y-m-d'),
            'category_product_id' => 1
        ];

		$result = $this->product_model->add($input);

		if ($result > 0)
		{
			$data['message'] = 'Berhasil menyimpan product';
			$data['status'] = TRUE;	
		} 
		else 
		{
			$data['message'] = 'Gagal menyimpan product';
			$data['status'] = FALSE;	
		}

		return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		
	}

	/**
	 * update product
	 *
	 * @return array
	 */
	public function update()
	{
		$this->load->model('product_model');

		$tblProduct = $this->db->where('id_product', $this->input->post('id'))->get('tbl_products')->row_array();

		$imageHapus = $tblProduct['img_product_1'];
		$image = $this->uploadImage();
		$failImage = '';

		if ($image['result'] == 'gagal') 
		{
			
			if ($tblProduct['img_product_1'] != "")
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
		$name = htmlentities($this->input->post('name'));
		$price = $this->input->post('price');
		$label = $this->input->post('label');

		$input = [
            'name_product' => $name,
            'price_product' => $price,
            'img_product_1' => $imageUpdate,
            'label_product' => $label,
            'date_input' => date('Y-m-d'),
            'category_product_id' => 1
        ];

		$result = $this->product_model->update($id, $input);
        $data['message'] = '';
        $data['status'] = '';

		if ($result > 0)
		{
			if ($imageHapus != $imageUpdate) {
				unlink('assets/template_frontend/images/products/'.$imageHapus);
			}
			$data['message'] = 'Berhasil mengubah produk';	
			$data['status'] = TRUE;	
		}
		else
		{
			$data['message'] = "Gagal mengubah produk $failImage";
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
	public function uploadImage()
	{
		$config['upload_path'] 	 = './assets/template_frontend/images/products/';
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
	* Delete product
	*
	*/
	public function delete()
	{
		$this->load->model('product_model');

		$id = $this->input->post('id');
		$data['message'] = "";
		if ($id != NULL) {
			$tblProduct = $this->db->where('id_product', $id)->get('tbl_products')->row_array();
			$imageHapus = $tblProduct['img_product_1'];

			$result = $this->product_model->delete($id);

			if ($result > 0) 
			{
				unlink('assets/template_frontend/images/products/'.$imageHapus);
				$data['message'] = 'Berhasil mendelete product';	
				$data['status'] = TRUE;	
			} 
			else 
			{
				$data['message'] = 'Gagal mendelete product';
				$data['status'] = FALSE;
			}
			
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

}
