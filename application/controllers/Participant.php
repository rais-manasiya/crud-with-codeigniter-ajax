<?php
class Participant extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ParticipantModel');
	}
	function index(){
		$this->load->view('listParticipant');
	}
	function show(){
		$data=$this->ParticipantModel->participantList();
		echo json_encode($data);
	}
	function save(){
		$data=$this->ParticipantModel->saveParticipant();
		echo json_encode($data);
	}
	function update(){
		$data=$this->ParticipantModel->updateParticipant();
		echo json_encode($data);
	}
	function delete(){
		$data=$this->ParticipantModel->deleteParticipant();
		echo json_encode($data);
	}
}