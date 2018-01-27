<?php

	
	// Codes Written by : Mubbarak Aminu 
// date : 31 December 2017


 Class Candidate_model extends CI_model{
	 
	 //fetching data for the admin dashboard
	 public function Ev_index(){
		 	
			//fetch all authorization activities for admin
			
		 
		 }

	public function candidate_details($candidate_id){
		$this->db->select('*');
		$this->db->from('president_canditate');
		$this->db->where('id', $candidate_id);

		$query = $this->db->get();

		return $query->row();
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
						$data = array(
							'id'		=> $row['id'],
							'full_name'	=> $row['full_name']
						);
					}
			}

			$query->free_result();
			return $data;

	}	 


	}
	
?>	 