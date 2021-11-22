<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
	}
	public function viewslider()
	{
		$data['group'] = $this->slider_model->get_group();
		$data['rows'] = $this->slider_model->get_slide();
		$data['options'] = $this->slider_model->get_option();
		
		$this->load->view('header');
		$this->load->view('viewslider', $data);
		$this->load->view('footer');
	}
	public function viewmultislider()
	{
		$groupid = $this->input->get('groupid');
		$data['group'] = $this->slider_model->get_group();
		$data['rows'] = $this->slider_model->get_slide($groupid);
		$data['options'] = $this->slider_model->get_option($groupid);
		$this->load->view('viewslider', $data);
	}
	public function addslides()
	{
		$this->form_validation->set_rules('title','Title','required|trim'); 
		if ($this->form_validation->run() == true)
		{
			$config['upload_path'] = FCPATH . '/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{	
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else
			{
				$fdata = array('upload_data' => $this->upload->data());
				$data = array(
					'title' => $this->input->post('title'),
					'photo' => $fdata['upload_data']['file_name'],
					'group_id' => $this->input->post('groupid')
				);
				if($this->slider_model->addslide($data))
				{
					$this->session->set_flashdata('success_message', "Successfully addes slide");
					redirect('slider/viewslider');
				}
			}
		}
		$data['rows'] = $this->slider_model->get_group();
		$this->load->view('header');
		$this->load->view('addslides', $data);
		$this->load->view('footer');
	}
	public function addoption()
	{
		$this->form_validation->set_rules('groupid','Group id','callback_select_validate'); 
		if ($this->form_validation->run() == true)
		{
			if($this->input->post('iscarousel') == 'true')
			{
				$data['row'] = array(
					'group_id' => $this->input->post('groupid'),
					'mode' => $this->input->post('mode'),
					'captions' => $this->input->post('captions'),
					'isCarousel' => $this->input->post('iscarousel'),
					'slideWidth' =>  $this->input->post('slidewidth'),
					'minSlides' => $this->input->post('minslides'),
					'maxSlides' => $this->input->post('maxslides'),
					'moveSlides' => $this->input->post('moveslides'),
					'slideMargin' => $this->input->post('slidemargin')
				);
			} else {
				$data['row'] = array(
					'group_id' => $this->input->post('groupid'),
					'mode' => $this->input->post('mode'),
					'captions' => $this->input->post('captions'),
					'isCarousel' => $this->input->post('iscarousel'),
					'slideWidth' => '100%',
					'minSlides' => 1,
					'maxSlides' => 1,
					'moveSlides' => 1,
					'slideMargin' => 0
				);
			}
			if($this->slider_model->addoption($data))
			{
				$this->session->set_flashdata('success_message', "Successfully Added Options");
				redirect('slider/viewslider');
			}
		}
		$data['rows'] = $this->slider_model->get_group();
		$this->load->view('header');
		$this->load->view('addoption',$data);
		$this->load->view('footer');
	}
	function select_validate($a)
	{
		if($a==""){
			$this->form_validation->set_message('select_validate', 'Please Select Your City.');
			return false;
		} else{
			return true;
		}
	}
	public function addgroup()
	{
		$this->form_validation->set_rules('group_name','Group Name','required|trim');
		if ($this->form_validation->run() == true)
		{
			$data = array(
				'group_name' => $this->input->post('group_name')
			);
			if($this->slider_model->addgroup($data))
			{
				$this->session->set_flashdata('success_message', "Successfully Added Group");
				redirect('slider/viewslider');
			}
		}
		$this->load->view('header');
		$this->load->view('addgroup');
		$this->load->view('footer');
	}
	public function view()
	{
		$gid = $this->input->get('grid');
		$data['rows'] = $this->slider_model->get_slide($gid);
		$data['options'] = $this->slider_model->get_option($gid);
		$this->load->view('header');
		$this->load->view('view',$data);
		$this->load->view('footer');
	}
}
