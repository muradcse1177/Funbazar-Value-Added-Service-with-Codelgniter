<?php
class Content_insert_model extends CI_Model{

	public function content_insert($data){	
		$result=$this->db->insert('contents', $data);
		if($result){
			$messege['uploadresult']="Congrats! Content uploaded successfully.";
		}
		else{
			$messege['uploadresult']="Sorry! Content not uploaded.";
		}
		return array($messege);
	}


	public function session_check (){
		return $this->session->userdata('userid') != FALSE;
	}

}