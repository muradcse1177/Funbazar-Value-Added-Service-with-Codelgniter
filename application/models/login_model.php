<?php
class Login_model extends CI_Model{

	public function validation(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$attr =array(
			'username' =>$username,
			'password' =>$password,
		);
		$query = $this->db->get_where('user',$attr);

		if($query->num_rows() > 0){
			$attr = array(
				'userid'=> $query->row(0)->id,
				'username'=> $username,
			);
			$this->session->set_userdata($attr);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	public function session_check (){
		return $this->session->userdata('userid') != FALSE;
	}

}