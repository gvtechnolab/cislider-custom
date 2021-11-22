<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slider_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{

	}
	public function get_slide($group_id = 1)
	{
		$q = $this->db->get_where('slides', array('group_id' => $group_id));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}		
			return $data;
		}
	}
	public function addslide($data)
	{
		if($this->db->insert('slides',$data))
			return true;
		return false;
	}
	public function get_option($group_id = 1)
	{
		$q = $this->db->get_where('options', array('group_id' => $group_id),1);
		if($q->num_rows() > 0) {
			$data = $q->result();
			return $data[0];
		}
	}
	public function addoption($data)
	{
		if($this->db->insert('options', $data['row']))
			return true;
		return false;
	}
	public function addgroup($data)
	{
		if($this->db->insert('group',$data))
			return true;
		return false;
	}
	public function get_group()
	{
		$q = $this->db->get('group');
		if($q->num_rows() > 0) {
			$data = $q->result();
			return $data;
		}
	}
}
