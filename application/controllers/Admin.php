<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index(){

		if(!$this->session->userdata('Logged_in')){
			redirect('admin/login');
		}


		$data['title'] = "Welcome to E-voting Admin Section";

		$data['main_content'] = "Admin/Dashboard";

		//loading the data from the db

		$data['students'] = $this->Admin_model->all_students();

		$data['pre_candidate'] = $this->Admin_model->list_president();

		$data['vice_presi'] = $this->Admin_model->list_vice_president();

		/*print_r($data['pre_candidate']);
		die();*/


		$this->load->view('admin/layout/main', $data);
	}



	public function login(){

		if(isset($_POST['login'])){

			$this->form_validation->set_rules('email', 'E-mail', 'required|trim|email');
			$this->form_validation->set_rules('pasword', 'Password', 'required|trim|');

			if($this->form_validation->run() == false){

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				//hash the password before checking it

				//send this data for db check

				$admin_id = $this->Admin_model->ev_admin_login($email, $password);

				if($admin_id){

					$data = array(
							'admin_id'  => $admin_id,
							'email'     => $email,
							'logged_in'	=> true
							);
					//set you session data
					$this->session->set_userdata($data);

					//set flast data
					$this->session->set_flashdata('Logged_in', 'Welcome to  Admin Dashboard');
					
					redirect('admin/index');


				}else{
					$data['title'] = "Fail Login";

					//set flash data
					$this->session->set_flashdata('Failed', 'Login Fail, Try Again');

					$this->load->view('admin/login');

				}


			}else{
				$data['title'] = "fail login";

			//set flash data
			$this->session->set_flashdata('Failed', 'Login Fail, Try Again');

			$this->load->view('admin/login');
			}


		}else{


			$data['title'] = "Admin Dashboard Login";

			$this->load->view('Admin/login');
			


		}

		
	}

	public function add_student(){

		if(isset($_POST['add_student'])){

			/*echo "Good Here For Now ";
			die();*/
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('reg_num', 'Registration Number', 'required|trim');
			$this->form_validation->set_rules('department', 'Department', 'required|trim');
			$this->form_validation->set_rules('level', 'Level', 'required|trim');
			$this->form_validation->set_rules('faculty', 'Faculty', 'required|trim');

				//check if the validation 
				if($this->form_validation->run() == true){

					//collect the input and put them into a variable
					$first_name = $this->input->post('first_name');
					$last_name  = $this->input->post('last_name');
					$reg_num 	= $this->input->post('reg_num');
					$department = $this->input->post('department');
					$level 		= $this->input->post('level');
					$faculty    = $this->input->post('faculty');


					//put the input data into an array
					$data = array(
						'first_name'	=> $first_name,
						'last_name'		=> $last_name,
						'reg_no'		=> $reg_num,
						'faculty'		=> $faculty,
						'department'	=> $department,
						'level'			=> $level,
						'is_candidate'	=> '0'
							);
					/*print_r($data);
					die();*/


					$add_student = $this->Admin_model->add_student($data);

						if($add_student){

							$data['title'] = "Thank You Page";

							$data['main_content'] = "Admin/thank_you";

							$this->load->view('admin/layout/main', $data);

						}else{

							echo "Error Message Here";
							die();

						}



				}else{

					$data['title'] = "Fail of validation";

					$data['main_content'] = "Admin/add_student";

					$this->load->view('admin/layout/main', $data);

				}	


		}else{
			$data['title'] = "add student section";

			$data['main_content'] = "admin/add_student";

			$this->load->view('admin/layout/main', $data);

		}

	}

	public function stud_details(){
			$id = $this->uri->segment(3);
			
			$data['stud_details'] = $this->Admin_model->stud_details($id);

			
			$data['main_content'] = 'Admin/stud_details';

			$this->load->view('admin/layout/main', $data);



	}



	public function pre_candidate(){

					

		if(isset($_POST['president'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');

				if($this->form_validation->run() == true){
					

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

						

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_president($data);

				if($add_candidate){


					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);



					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{

				$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');

				}	




		}else{

				$this->session->set_flashdata('Failed', 'You Can not follow this route');

				redirect('admin/index');
		}
	}

	public function vicepre_candidate(){

					

		if(isset($_POST['vice_president'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					/*echo $position;
					die();*/

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_vice_pre($data);


				if($add_candidate){

					$id = $this->input->post('student_id');

					$data = array(
							'is_candidate'	=> '1'
							);
					$updata_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{

					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');

				}	



		}else{
				
					$this->session->set_flashdata('Failed', 'You Can not follow this route');

					redirect('admin/index');
		}
	}


	public function sec_gen_candidate(){

					

		if(isset($_POST['sec_gen'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_sec_gen($data);

				if($add_candidate){


					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{
				$this->session->set_flashdata('Failed', 'Validation Failed');

				redirect('admin/index');

				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
	}
}


	public function fin_sec_candidate(){

					

		if(isset($_POST['fin_sec'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_fin_sec($data);

				if($add_candidate){


					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);



					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{
					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');
				}	



		}else{
			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
		}
	}




	public function social_candidate(){

					

		if(isset($_POST['social_dir'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_soci_dir($data);

				if($add_candidate){


					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{

					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');

				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
			

		}
	}



	public function sport_candidate(){

					

		if(isset($_POST['sport_dir'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_spo_dir($data);

				if($add_candidate){


					//update the student candidature status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{
					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');

				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');

		}
	}

	public function trea_candidate(){

					

		if(isset($_POST['treasurer'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					/*echo $position;
					die();*/

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_trea($data);

				if($add_candidate){

					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{

					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');
				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
		}
	}

	public function pro_candidate(){

					

		if(isset($_POST['pro'])){

			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_pro($data);

				if($add_candidate){


					//update the student candidate status
					
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{
					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');
				}	



		}else{

					$this->session->set_flashdata('Failed', 'You Can not follow this route');

					redirect('admin/index');
		}
	}

	public function welf_candidate(){

					

		if(isset($_POST['welfare'])){


				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_welf($data);

				if($add_candidate){

					//update the student candidate status

					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);

					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{

					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');
				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
		}
	}

		public function asis_sec_candidate(){

					

		if(isset($_POST['asis_sec_gen'])){

				
			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
			$this->form_validation->set_rules('position', 'Position', 'required|trim');

				if($this->form_validation->run() == true){
					/*echo "Good Here";
					die();*/

					//collect form data
					$student_id = $this->input->post('student_id');
					$full_name = $this->input->post('full_name');
					$position  = $this->input->post('position');

					

						//this section add candidate who is contesting for the position
						// of the president

							$data = array(
							'student_id'	=> $student_id,
							'full_name'	=> $full_name,
							'position'	=> $position
							);
				$add_candidate = $this->Admin_model->add_asis_sec($data);

				if($add_candidate){
					$id = $student_id;
					$data = array(
							'is_candidate'	=> '1'
							);
					$update_student = $this->Admin_model->update_student($id, $data);


					$data['title'] = "Thank You";

					$data['main_content'] = "Admin/Thank_you";

					$this->load->view('admin/layout/main', $data);
					
				}

						

				}else{
					$this->session->set_flashdata('Failed', 'Validation Failed');

					redirect('admin/index');
				}	



		}else{

			$this->session->set_flashdata('Failed', 'You Can not follow this route');

			redirect('admin/index');
		}
	}	




	public function logout(){
		$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('email');

			//set logout seccess message
			$this->session->flashdata('success', 'You Have Logout');

			//redirect to E-voting Main Home page
			redirect('Welcome');
	}

















}