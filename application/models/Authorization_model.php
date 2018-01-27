<?php

	
// Codes Writted by : Mubbarak Aminu 
// date : 31 December 2017


 Class Authorization_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }

		 public function ev_login($last_name, $reg_no){
		 	//varity login credentials here
		 		$this->db->select('*');
		 		$this->db->from('students');
		 		$this->db->where('last_name', $last_name);
		 		$this->db->where('reg_no', $reg_no);
		 		$this->db->limit('1');

		 		$query = $this->db->get();

		 		if($query->num_rows() == 1){
		 			return $query->row()->id;
		 		}else{
		 			return false;
		 		}
		 }


		 public function ev_varify_otp($otp){
		 		$this->db->select('id','otp_pin');
		 		$this->db->from('ev_otp');
		 		$this->db->where('otp', $otp);
		 		$this->db->limit('1');

		 		$query = $this->db->get();

		 		if($query->num_rows() == 1){
		 			return $query->row()->otp_pin;
		 		}else{
		 			return false;
		 		}

		 }
	
	public function fetch_otp($student_id){
			$this->db->select('otp_pin');
			$this->db->from('varify_otp');
			$this->db->where('student_id', $student_id);
			$this->db->limit('1');

			//runnong the query
			$query = $this->db->get();

			if($query->num_rows() == 1){
				return $query->row()->otp_pin;
			}else{
				return false;
			}
	}


	public function update_otp($student_id, $data){
		$this->db->where('student_id', $student_id);
		$this->db->update('varify_otp', $data);

	}


	public function otp_status($student_id){
		$this->db->select('*');
		$this->db->from('varify_otp');
		$this->db->limit('1');

		$query = $this->db->get();

		return $query->row()->verify;
	}






	}



?>