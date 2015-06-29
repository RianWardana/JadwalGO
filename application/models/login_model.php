<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
	}

    public function load_rules()
	{
		$rules = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required'
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required'
                            ),
        );
        return $rules;
	}

	public function check_valid()
	{
		$rules = $this->load_rules();
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run())
		{
			return TRUE;
		}
		
		else
		{
			return FALSE;
		}
	}

    public function check_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array('username' => $username, 'password' => $password);
		$query = $this->db->where($where)->limit(1)->get('user');
		
		if($query->num_rows() == 1)
		{
			$data = array('username' => $username, 'login' => TRUE);
            $this->session->set_userdata($data);
			return TRUE;
		}
		
		else
		{
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata(array('username' => '', 'login' => FALSE));
		$this->session->sess_destroy();
	}
	
}