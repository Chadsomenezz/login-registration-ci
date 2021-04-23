<?php

class form_process extends CI_Model{

	public function login_process($data){
		$this->db->where('username',$data['username']);
		$this->db->or_where('email',$data['username']);
		$this->db->where('password',$data['password']);
		$result = $this->db->get('loginreg',$data);
		if ($result->num_rows() === 1){
			return $result->row(0);
		}
		return false;
	}

	public function registration_process($data){
		$this->db->where('username', $data['username']);
		$this->db->or_where('email',$data['email']);

		//IF THERE IS ALREADY A SIMILAR USERNAME OR EMAIL
		$result = $this->db->get('loginreg',$data);
		if ($result->num_rows() === 1){
			return false;
		}
		$result = $this->db->insert('loginreg',$data);
		return $result;

	}
}
