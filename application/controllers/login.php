<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('login_model', 'login_model', TRUE);
    }

	public function index(){
	
		if($this->session->userdata('login') == TRUE){
			redirect('update');
		}
		
		else{
			$this->data['function'] = 'login';
			
			if($this->login_model->check_valid()){
				if($this->login_model->check_login()){
					redirect('update');
				}
				
				else{
					$this->load->view('navbar_view', $this->data);
					$this->load->view('login_view');
				}
				
			}
			
			else{
				$this->load->view('navbar_view', $this->data);
				$this->load->view('login_view');
			}
		}
	
	}
	
	public function logout(){
		$this->login_model->logout();
		redirect('jadwal');
	}
	
}