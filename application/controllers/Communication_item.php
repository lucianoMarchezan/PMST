<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Communication_item extends CI_Controller{
    
    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('communication_item_model');
    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function communication_form($project_id){
        $query['communication_item'] = $this->communication_item_model->getCommunication_itemProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/communication_item', $query);
    }
    
    public function insert() {
        $communication_item['type'] = $this->input->post('type');
        $communication_item['description'] = $this->input->post('description');
        $communication_item['content'] = $this->input->post('content');
        $communication_item['distribution_reason'] = $this->input->post('distribution_reason');
        $communication_item['language'] = $this->input->post('language');
        $communication_item['channel'] = $this->input->post('channel');
        $communication_item['documento_format'] = $this->input->post('documento_format');
        $communication_item['metod'] = $this->input->post('metod');
        $communication_item['frequency'] = $this->input->post('frequency');
        $communication_item['allocated_resources'] = $this->input->post('allocated_resources');
        $communication_item['format'] = $this->input->post('format');
        $communication_item['local'] = $this->input->post('local');
        $communication_item['project_id'] = $this->input->post('project_id');
        $communication_item['status'] = (int) $this->input->post('status');

        $data['communication_item'] = $communication_item;
        $query = $this->communication_item_model->insertCommunication_item($data['communication_item']);

        if($query){
            redirect('projects');
        }
    }

    public function update($id){
        $communication_item['type'] = $this->input->post('type');
        $communication_item['description'] = $this->input->post('description');
        $communication_item['content'] = $this->input->post('content');
        $communication_item['distribution_reason'] = $this->input->post('distribution_reason');
        $communication_item['language'] = $this->input->post('language');
        $communication_item['channel'] = $this->input->post('channel');
        $communication_item['documento_format'] = $this->input->post('documento_format');
        $communication_item['metod'] = $this->input->post('metod');
        $communication_item['frequency'] = $this->input->post('frequency');
        $communication_item['allocated_resources'] = $this->input->post('allocated_resources');
        $communication_item['format'] = $this->input->post('format');
        $communication_item['local'] = $this->input->post('local');
        $communication_item['status'] = (int) $this->input->post('status');
        
        $data['communication_item'] = $communication_item;
        $query = $this->communication_item_model->updateCommunication_item($data['communication_item'], $id);

        if($query){
           redirect('project/' . $id);
        }
    }

    public function delete($id){
        $query = $this->communication_item_model->deleteCommunication_item($id);
        var_dump($query);
        if($query){
            redirect('project/' . $id);
        }
    }
}
?>