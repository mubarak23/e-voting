<?php

	
	// codes created by : Mubbarak Aminu 
// date : 31 December 2017


 Class Evoting_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }


	public function vote_status_pre($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_president');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}	 


	public function pre_candidate(){
		$this->db->select('*', 'students.*');
		$this->db->from('president_canditate');
		$this->db->join('students', 'president_canditate.student_id = students.id');

		$query = $this->db->get();

		return $query->result_array();


	}


	public function president_vote($data){
		$insert = $this->db->insert('vote_count_president', $data);

			if($insert){

				return true;
			
			}else{

				return false;

			}
	}

	public function vote_status_vp($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_vp_president');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}	 


	public function vp_candidate(){
			$this->db->select('*', 'students*');
			$this->db->from('vice_presi_cand');
			$this->db->join('students', 'vice_presi_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();
	}

	public function vp_vote($data){
				$insert = $this->db->insert('vote_count_vp_president', $data);

				if($insert){

					return true;

				}else{

					return false;

				}
		}


		public function update_cand_pre($id, $data){
				$this->db->where('id', $id);
				$this->db->update('president_canditate', $data);

		}


		public function update_cand_vp($id, $data){
				$this->db->where('id', $id);
				$this->db->update('vice_presi_cand', $data);

		}

		public function vote_status_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_sec_gen');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


	// database interaction for sec gen position

	public function sec_gen_candidate(){
			$this->db->select("*");
			$this->db->from("sec_gen_cand");
			$this->db->join('students', 'sec_gen_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	


	public function sec_gen_vote($data){
			$insert = $this->db->insert('vote_count_sec_gen', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_secgen($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sec_gen_cand', $data);

		}


	// database interaction for sec gen position
		public function vote_status_fin_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_fin_sec');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


			//collecting all candidate for the position of fin sec
			public function fin_sec_candidate(){
			$this->db->select("*");
			$this->db->from("fin_sec_cand");
			$this->db->join('students', 'fin_sec_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function fin_sec_vote($data){
			$insert = $this->db->insert('vote_count_fin_sec', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_finsec($id, $data){
				$this->db->where('id', $id);
				$this->db->update('fin_sec_cand', $data);

		}


		// database interaction for sec gen position
		public function vote_status_sport_dir($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_sport_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}


		//collecting all candidate for the position of sport director
			public function sport_dir_candidate(){
			$this->db->select("*");
			$this->db->from("sport_dir_cand");
			$this->db->join('students', 'sport_dir_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function sport_dir_vote($data){
			$insert = $this->db->insert('vote_count_sport_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_sportdir($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sport_dir_cand', $data);

		}


		// database interaction for social director position
		public function vote_status_social_dir($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_social_dir');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function social_dir_candidate(){
			$this->db->select("*");
			$this->db->from("social_dir_cand");
			$this->db->join('students', 'social_dir_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function social_dir_vote($data){
			$insert = $this->db->insert('vote_count_social_dir', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_socialdir($id, $data){
				$this->db->where('id', $id);
				$this->db->update('sport_dir_cand', $data);

		}

			// database interaction for social director position
		public function vote_status_treasurer($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_trea');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}

//collecting all candidate for the position of sociaL director
			public function treasurer_candidate(){
			$this->db->select("*");
			$this->db->from("trea_cand");
			$this->db->join('students', 'trea_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function treasurer_vote($data){
			$insert = $this->db->insert('vote_count_trea', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_treasurer($id, $data){
				$this->db->where('id', $id);
				$this->db->update('trea_cand', $data);

		}


			// database interaction for social director position
		public function vote_status_pro($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_pro');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}




//collecting all candidate for the position of PRO
			public function pro_candidate(){
			$this->db->select("*");
			$this->db->from("pro_cand");
			$this->db->join('students', 'pro_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function pro_vote($data){
			$insert = $this->db->insert('vote_count_pro', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_pro($id, $data){
				$this->db->where('id', $id);
				$this->db->update('pro_cand', $data);

		}


			// database interaction for social director position
		public function vote_status_welf($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_welfare');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}



//collecting all candidate for the position of welf
			public function welf_candidate(){
			$this->db->select("*");
			$this->db->from("welf_cand");
			$this->db->join('students', 'welf_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function welf_vote($data){
			$insert = $this->db->insert('vote_count_welfare', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_welf($id, $data){
				$this->db->where('id', $id);
				$this->db->update('welf_cand', $data);

		}

		// database interaction for social director position
		public function vote_status_asis_sec($student_id){
			$this->db->select('vote_status');
			$this->db->from('vote_count_asis_sec_gen');
			$this->db->where('student_id', $student_id);

			$query = $this->db->get();
			
			return $query->row();	
		}



//collecting all candidate for the position of Asistant Sec 
			public function asis_sec_gen_candidate(){
			$this->db->select("*");
			$this->db->from("asis_sec_gen_cand");
			$this->db->join('students', 'asis_sec_gen_cand.student_id = students.id');

			$query = $this->db->get();

			return $query->result_array();

	}	



	public function asis_sec_gen_vote($data){
			$insert = $this->db->insert('vote_count_asis_sec_gen', $data);

			if($insert){
				return true;
			}else{
				return false;
			}
	}

		public function update_cand_asis_sec_gen($id, $data){
				$this->db->where('id', $id);
				$this->db->update('asis_sec_gen_cand', $data);

		}















	}
	
?>	 