<?php

	
	// Codes Written by : Mubbarak Aminu 
// date : 31 December 2017


 Class Admin_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }

		 public function add_student($data){

		 	$insert = $this->db->insert('students', $data);

		 	if($insert){
		 		return true;
		 	}else{
		 		return false;
		 	}
		 }
		

	public function ev_admin_login($email, $password){
		 	//varity login credentials here
		 		$this->db->select('*');
		 		$this->db->from('Admin');
		 		$this->db->where('email', $email);
		 		$this->db->where('password', $password);
		 		$this->db->limit('1');

		 		$query = $this->db->get();

		 		if($query->num_rows() == 1){
		 			return $query->row()->id;
		 		}else{
		 			return false;
		 		}
		 }

		 public function stud_details($id){
		 		$this->db->select('*');
		 		$this->db->from('students');
		 		$this->db->where('id', $id);
		 		$this->db->limit('1');

		 		$query = $this->db->get();

		 		return $query->row();

		 		}

		 public function update_student($id, $data){
		 		$this->db->where('id', $id);
		 		$this->db->update('students', $data);
		 
		 	}


		 public function add_president($data){

		 		$insert = $this->db->insert('president_canditate', $data);

		 		if($insert){
		 			return true;
		 		}else{
		 			return false;			
		 		}	
		 }

		 public function add_vice_pre($data){
		 		$insert = $this->db->insert('vice_presi_cand', $data);

		 			if($insert){

		 				return true;

		 			}else{

		 				return false;

		 			}
		 }

		 public function add_sec_gen($data){
		 	$insert = $this->db->insert('sec_gen_cand', $data);
		 		if($insert){
		 			return true;
		 		}else{
		 			return false;
		 		}
		 }

		 public function add_fin_sec($data){
		 		$insert = $this->db->insert('fin_sec_cand', $data);

		 			if($insert){
		 				return true;
		 			}else{
		 				false;
		 			}
		 }

		 public function add_spo_dir($data){
		 		$insert = $this->db->insert('sport_dir_cand', $data);

		 			if($insert){
		 				return true;
		 			}else{
		 				return false;
		 			}
		 }

		 public function add_soci_dir($data){
		 	$insert = $this->db->insert('social_dir_cand', $data);
		 		if($insert){
		 			return true;
		 		}else{
		 			return false;
		 		}		 		
		 }

		 public function add_pro($data){
		 	$insert = $this->db->insert('pro_cand', $data);

		 		if($insert){
		 			return true;
		 		}else{
		 			return false;
		 		}
		 }

		public function add_trea($data){
			$insert = $this->db->insert('trea_cand', $data);

				if($insert){
					return true;
				}else{
					return false;
				}
		}

		public function add_welf($data){
				$insert = $this->db->insert('welf_cand', $data);

				if($insert){
					return true;
				}else{
					return false;
				}
		} 

		public function add_asis_sec($data){
				$insert = $this->db->insert('asis_sec_gen_cand', $data);

				if($insert){
					return true;
				}else{
					return false;
				}
		} 


		public function all_students(){
			$this->db->select('*');
			$this->db->from('students');
			$this->db->limit('15');

			$query = $this->db->get();

			return $query->result_array();

		}



	public function list_president(){
		$this->db->select('*');
		$this->db->from('president_canditate');
		$this->db->join('students', 'president_canditate.student_id = students.id');
		$this->db->limit(2);

		$query = $this->db->get();

		return $query->result_array();
	}


	public function list_vice_president(){
			$this->db->select('*');
			$this->db->from('vice_presi_cand');
			$this->db->join('students', 'vice_presi_cand.student_id = students.id');
			$this->db->limit('2');

			$query = $this->db->get();

			return $query->result_array();
			
		}	 
		













	}
	
?>	 