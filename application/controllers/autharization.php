<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autharization extends CI_Controller {


	public function index(){
		
		//checking the first authorization button of login form has been click
		if(isset($_POST['login'])){

			//set validation rules that will validat user login details
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('reg_no', 'Registration Number', 'required|trim');

			//run the validation
			if($this->form_validation->run() == true){
				
	
				$last_name = $this->input->post('last_name');
				$reg_no = $this->input->post('reg_no');


				//run db check fagaoin user login details
				$id = $this->Authorization_model->ev_login($last_name, $reg_no);

				//check if the details are found in the database
					
				if($id){

				// after the check of user details again db data set strong sesstion and direct to OTP 
				//Autharization function


					$data = array(
						'last_name'	=> $last_name,
						'logged_in'	=> true,
						'student_id'	=> $id	
						);

					//set you session data
					$this->session->set_userdata($data);

					//set flast data
					$this->session->set_flashdata('Logged_in', 'You  can Now Submit Your OTP');
					
					redirect('Autharization/ev_otp');

				}else{

					// if result did not match return an an approperiate error message and redirect back to ///login screen

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Login Failed, Please use correct login details');
			//load the login page
			$this->load->view('e-voting/login');


					//return error messag with the login form
					//alternative i will process it wit jquery
					
				}


				


			}else{
				//return error message

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Please Check Your login Details And Try Again');
			//load the login page
			$this->load->view('e-voting/login');
				
			}

		}else{

			$data['title'] = "Welcome to Neusa first Login system";

			$this->session->set_flashdata('Failed', 'Unauthurize Access, Please Login');

			//load the login page
			$this->load->view('e-voting/login');
		}

		
	}


	

	
	public function ev_otp(){

		//check to ensure user login before showing this otp feature
		if(!$this->session->userdata('logged_in')){
			redirect('Autharization');
		}

		if(isset($_POST['varify_otp'])){
			//process the pin here

			$this->form_validation->set_rules('otp', 'OTP', 'required|number');

			if($this->form_validation->run() == false){

				$otp = $this->input->post('opt');

				$student_id = $this->session->userdata('student_id');

				//fetch student otp base on the id
				$original_otp = $this->Authorization_model->fetch_otp($student_id);

				//varify to ensure that both the submited opt and otp again student ii
				// in the db are equal
				// if they are equal reidrect to voting page

				if($otp == $original_otp ){



				 //update the db to set varify column to 1
				 	$data = array(
				 			'verify'	=> '1'
				 			);
				 	
				 	$update_otp = $this->Authorization_model->update_otp($student_id, $data);

				 	/*echo "Good Here and otp is updated Here";

				 	die();
*/
				 	//colect the varify status of the student from the varify otp table
				 	$varify = $this->Authorization_model->otp_status($student_id);

				 	/*echo $varify;
				 	die();*/

				 	//set the varify to global session
				 	$data = array(
				 			'otp_status' => $varify
				 			);

				 	$this->session->set_userdata($data);

				 	$this->session->flashdata('suecess', 'Welcome to Voting Page');

				 	redirect('Evoting/pre_candidate');		


					//redirect to voting page and give a message
				}else{
					//if there is not match redirect bac to otp submission page
					//with an errro message 

				 	$this->session->flashdata('Failed', 'Your OTP Did Not Match');
					
					$this->load->view('e-voting/submit_otp');
				}



			/*	if($otp){
					//set suecess message and redirect to first voting page
					$this->session->set_flashdata('suecess', 'Welcome to the Voting Page');
					redirect('Evoting');
				}else{
					//send error message and redirect to otp page

			$this->session->set_flashdata('Failed', 'Uable to varify otp, try again');
					
			$this->load->view('e-voting/submit_otp');
				}*/

			}else{
				//show erro message and redirect to authrization page


			//set flash data
			$this->session->set_flashdata('Failed', 'Wrong OTP');

			$this->load->view('e-voting/submit_otp');
			}

		}else{

			//set flash data
			$this->session->set_flashdata('Failed', 'Unauthurized Access Here');
					
			$this->load->view('e-voting/submit_otp');
		}
	}

	public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('student_id');
			$this->session->unset_userdata('last_name');
			$this->session->unset_userdata('otp_status');

			//set logout seccess message
			$this->session->flashdata('success', 'You Have Logout');

			//redirect to E-voting Main Home page
			redirect('Welcome');


	}


}