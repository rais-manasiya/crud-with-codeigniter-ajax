<?php
class ParticipantModel extends CI_Model{
	function participantList(){
		$hasil=$this->db->get('participant');
		return $hasil->result();
	}
	function saveParticipant(){
		$data = array(				
				'name' 			=> $this->input->post('name'), 
				'age' 			=> $this->input->post('age'), 
				'dob' 	=> $this->input->post('dob'), 
				'profession' 		=> $this->input->post('profession'), 
				'locality' 		=> $this->input->post('locality'), 
				'no_of_guests' 		=> $this->input->post('no_of_guests'), 
				'address' 		=> $this->input->post('address'), 
			);
		$result=$this->db->insert('participant',$data);
		return $result;
	}
	function updateParticipant(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$age=$this->input->post('age');
		$dob=$this->input->post('dob');
		$profession=$this->input->post('profession');
		$locality=$this->input->post('locality');
		$no_of_guests=$this->input->post('no_of_guests');
		$address=$this->input->post('address');

		$this->db->set('name', $name);
		$this->db->set('age', $age);
		$this->db->set('dob', $dob);
		$this->db->set('profession', $profession);
		$this->db->set('locality', $locality);
		$this->db->set('no_of_guests', $no_of_guests);
		$this->db->set('address', $address);
		$this->db->where('id', $id);
		$result=$this->db->update('participant');
		return $result;	
	}
	function deleteParticipant(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('participant');
		return $result;
	}	
}