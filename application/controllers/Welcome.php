<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		
	}
	
	public function index()
	{
	
	$result= $this->db->select("upload_video,id")->get("upload_video")->result();
	// foreach($result as $val){
	// // $res= trim($val->docs_file);
	// echo "<pre>";
	// 	print_r($val);

	// }

	foreach($result as $val){
		// $res= trim($val->docs_file);
		$res = str_replace(" ","",$val->upload_video);
        $where= array('id' => $val->id);
		$update = array('upload_video' =>$res);


		$this->db->where($where)->update('upload_video',$update);
		$this->session->set_flashdata('success', "SUCCESS_MESSAGE_HERE"); 
	}

	}
}
