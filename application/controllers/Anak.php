<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Anak extends CI_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		if($this->session->userdata('logged_in')){
 			$session_data = $this->session->userdata('logged_in');
 			$data['username'] = $session_data['username'];
 			$data['status'] = $session_data['status'];
 			$current_controller = $this->router->fetch_class();
 			$this->load->library('acl');
 			if (! $this->acl->is_public($current_controller))
 			{
 				if (! $this->acl->is_allowed($current_controller, $data['status']))
 				{
 					redirect('login/logout','refresh');
 				}
 			}
 		}else{
 			redirect('login','refresh');
 		}
 	}

 	public function Index()
 	{
 		$session_data=$this->session->userdata('logged_in');
 		$data['username']=$session_data['username'];
 		$this->load->view('loginAnak',$data);
 	}
 
 }
 
 /* End of file Pegawai.php */
 /* Location: ./application/controllers/Pegawai.php */ ?>