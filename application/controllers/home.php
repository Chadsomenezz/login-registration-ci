<?php


class Home extends CI_Controller{
	public function index(){
		$this->load->view("home");
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors_login'=>validation_errors()
			);

			$this->session->set_flashdata($data);
			redirect(base_url());
		}
		else
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->form_process->login_process($data);

			//IF NOT FALSE
			if ($result){
				$this->session->set_userdata('logged_in',$result);
				redirect(base_url());
			}
			$data = array(
				'errors_login'=>'Wrong Username or Password'
			);
			$this->session->set_flashdata($data);
			redirect(base_url());
		}


	}

	public function register(){
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', "required|matches[password]|min_length[6]");
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors'=>validation_errors()
			);

			$this->session->set_flashdata($data);
			redirect('home');
		}

		//IF VALID REGISTRATION
		else {

			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$result = $this->form_process->registration_process($data);

			//IF THERE ARE NO SIMILAR USERNAME OR EMAIL YET
			if($result){
				$data = array(
					'success'=>"Registration Successfully"
				);
				$this->session->set_flashdata($data);
				redirect(base_url());
			}
			else{
				$data = array(
					'errors'=>"Username or Email address is already exist"
				);
				$this->session->set_flashdata($data);
				redirect(base_url());
			}

		}

	}

}
