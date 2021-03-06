<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Issues_Record extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('issues_record', 'english');
		//$this->lang->load('issues_record', 'portuguese-brazilian');
		$this->load->model('Issues_record_model');
		$this->load->model('Issues_record_stakeholder_model');
	}

	public function addIssuesRecord($project_id){
		$query['issues_record'] = $this->Issues_record_model->getIssues_recordProject_id($project_id);
		$query['project_id'] = $project_id;
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/issues_record', $query);

	}



	public function insert() {
		$issues_record['identification'] = $this->input->post('identification');
		$issues_record['identification_date'] = $this->input->post('identification_date');
		$issues_record['question_description'] = $this->input->post('question_description');
		$issues_record['type'] = $this->input->post('type');
		$issues_record['responsable'] = $this->input->post('responsable');
		$issues_record['situation'] = $this->input->post('situation');
		$issues_record['action'] = $this->input->post('action');
		$issues_record['resolution_date'] = $this->input->post('resolution_date');
		$issues_record['replan_date'] = $this->input->post('replan_date');
		$issues_record['observations'] = $this->input->post('observations');
		$issues_record['status'] = $this->input->post('status');
		$issues_record['project_id'] = $this->input->post('project_id');
	
		$query = $this->Issues_record_model->insertIssues_record($issues_record);

		if ($query) {
			redirect('projects');
		}
	}

	public function update($id) {
			$issues_record['identification'] = $this->input->post('identification');
		$issues_record['identification_date'] = $this->input->post('identification_date');
		$issues_record['question_description'] = $this->input->post('question_description');
		$issues_record['type'] = $this->input->post('type');
		$issues_record['responsable'] = $this->input->post('responsable');
		$issues_record['situation'] = $this->input->post('situation');
		$issues_record['action'] = $this->input->post('action');
		$issues_record['resolution_date'] = $this->input->post('resolution_date');
		$issues_record['replan_date'] = $this->input->post('replan_date');
		$issues_record['observations'] = $this->input->post('observations');
		$issues_record['status'] = $this->input->post('status');
		$issues_record['project_id'] = $this->input->post('project_id');
	
		$query = $this->Issues_record_model->insertIssues_record($issues_record);

		if ($query) {
			redirect('projects');
		}
	}

}
?>