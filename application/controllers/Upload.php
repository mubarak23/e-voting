<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

		public function index(){

			/*echo "Good Here";
			die();*/

		$config['upload_path'] = APPPATH . 'upload';
		$config['allowed_types'] = 'jpeg|jpg|gif|png';
		$config['max_size'] = '1024';
		
		//loading the puload library
		$this->load->library('upload');
		$this->upload->initialize($config);


		if(isset($_POST['upload'])){
			/*echo "Good Here";
			die();
*/
			$this->form_validation->set_rules('image', 'Image', 'required');

				if($this->form_validation->run() == false){

					//process file upload
					 	if(! $this->upload->do_upload('image')){
						$data['error'] = $this->upload->display_errors();
						
						$this->load->view('upload', $data);
						
						}else{
							
				$upload = $this->input->post('image');			
				$data = array('upload_data' => $this->upload->data());

					echo "Good Here Image Has finally uploaded";
					die();
				
							}

				}else{

					//prcoess the error message here and savely return to upload view page

					echo "Something when wrong along the line of execution";
					die();

				}

		}else{
				$data['error'] = "";
			$this->load->view('upload', $data);
		}




		}	



}







?>