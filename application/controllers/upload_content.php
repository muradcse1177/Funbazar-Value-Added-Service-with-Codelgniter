<?php
class Upload_content extends CI_Controller{

	public function index(){
		
		$name=$this->input->post('name');
		$category=$this->input->post('category');
		$subcategory=$this->input->post('subcategory');
		$portal_name=$this->input->post('portal');
		$remarks=$this->input->post('remarks');
		$target_dir ="admin/uploads/".$category."/".$subcategory."/";	
		$target_dir_preview = "demo/".$category."/".$subcategory."/";
		$uploadstatus=0;
		
		function getRandomHex($num_bytes=4) {
		  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
		}
		if (!is_dir($target_dir)){
			mkdir($target_dir);
		}
		if (!is_dir($target_dir_preview)) {
			mkdir($target_dir_preview);
		}
		$temp = explode(".", $_FILES["file"]["name"]);
		$filename = getRandomHex(15);	
		$fullfilename = $filename . '.' . end($temp);
		if(move_uploaded_file($_FILES["file"]["tmp_name"],  $target_dir. $fullfilename))
			$uploadstatus=1;
		$temp_preview = explode(".", $_FILES["file_preview"]["name"]);	
		$fullfilename_preview = $filename . '.' . end($temp_preview);
		if(move_uploaded_file($_FILES["file_preview"]["tmp_name"],  $target_dir_preview. $fullfilename_preview))
			$uploadstatus=1;
		$target_link="admin/uploads/".$category."/".$subcategory."/".$fullfilename;
		$target_link_preview="demo/".$category."/".$subcategory."/".$fullfilename_preview;
		
		$data =array(
			'category' =>$category,
			'subcategory' =>$subcategory,
			'content_id' =>$filename,
			'name' =>$name,
			'preview_link' =>$target_link_preview,
			'file_link' =>$target_link,
			'uploded_by' =>'Murad',
			'downloaded' =>'0',
			'status' =>'Published',
			'remarks' =>$remarks,
			'portal' =>$portal_name,
		);
		$this->load->model('content_insert_model');
		$message=$this->content_insert_model->content_insert($data);
		$uploadresult = json_encode($message);
		$result = $this->content_insert_model->session_check();
		if($result){
			$this->load->view('head');
			$this->load->view('navigation_top');
			$this->load->view('upload_content',$uploadresult); 
		}
		else{
			$this->load->view('login');
		}
	}
}