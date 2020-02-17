<?php

class Admins extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->load->library('datatables');
//        $this->load->library('pdf');
        $this->check_isvalidated();
    }

    public function index() {

        $this->load->view('templates/header');
        $this->load->view('admins/index');
        $this->load->view('templates/footer');
    }

    public function incident() {

        $data['getIncidents'] = $this->repository_model->getIncidentCategory();
        $data['getID'] = $this->repository_model->getID();

        $this->load->view('templates/header');
        $this->load->view('admins/incident', $data);
        $this->load->view('templates/footer');
    }
    
    public function get_incident() {
        $data = $this->admin_model->get_incident();
        echo json_encode($data);
    }
    
    function add_incident() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->add_incident();
        redirect('admins/incident');
    }
    
    function edit_incident() { //insert record method
        $this->session->set_flashdata('success', 'You have been edit successfully');
        $this->admin_model->edit_incident();
        redirect('admins/incident');
    }
    
    

    public function incident_status() {

        $data['getUsers'] = $this->repository_model->getUser();
        $data['getBranches'] = $this->repository_model->getBranchList();
        $data['getIncidents'] = $this->repository_model->getIncidentCategory();
        $data['getID'] = $this->repository_model->getID();

        $this->load->view('templates/header');
        $this->load->view('admins/incident_status', $data);
        $this->load->view('templates/footer');
    }

    

    function update_incident_status() {
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->update_incident_status();
        redirect('admins/incident_status');
    }

    function insert_incident() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_incident();
        redirect('admins/index');
    }

    function getIncidentCategory() {
        $data = $this->repository_model->getIncidentCategory();
        echo json_encode($data);
    }

    public function sample() {
        $this->load->view('templates/header');
        $this->load->view('admins/sample');
        $this->load->view('templates/footer');
    }

    public function get_latest_incident() {
        $data = $this->admin_model->get_latest_incident();
        echo json_encode($data);
    }

    public function branch() {
        $this->load->view('templates/header');
        $this->load->view('admins/branch');
        $this->load->view('templates/footer');
    }

    public function getBranchList() {
        $data = $this->repository_model->getBranchList();
        echo json_encode($data);
    }

    function insert_branch() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_branch();
        redirect('admins/branch');
    }

    public function user() {
        $data['getBranchList'] = $this->repository_model->getBranchList();
        $data['getUserID'] = $this->repository_model->getUserID();
        
        $this->load->view('templates/header');
        $this->load->view('admins/user',$data);
        $this->load->view('templates/footer');
    }

    public function getUser() {
        $data = $this->repository_model->getUser();
        echo json_encode($data);
    }

    function insert_user() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_user();
        redirect('admins/user');
    }

    function get_assign_branch() {
        $userID = $this->input->post('id', TRUE);
        $data = $this->repository_model->get_assign_branch($userID);
        echo json_encode($data);
    }

    function dashboard() {
        
        $data['userCount'] = count($this->repository_model->getUser());
        $data['series_pie'] = json_encode($this->admin_model->graphPie(), JSON_NUMERIC_CHECK);
       

        $get_series = $this->admin_model->graphLine();
        foreach ($get_series as $row) {
            $series_data[] = array('name' => $row['incidentName'], 'data' => array(floatval($row['DateFirst']), floatval($row['DateSecond']), floatval($row['DateThird']), floatval($row['DateFourth']), floatval($row['DateFifth']), floatval($row['DateSixth'])));
        }
        $data['series_data'] = json_encode($series_data);

        $get_category = $this->admin_model->get_date();
        $category_data = array($get_category->data1, $get_category->data2, $get_category->data3, $get_category->data4, $get_category->data5, $get_category->data6);
        $data['category'] = json_encode($category_data);
        
        $data['get_table']= $this->admin_model->get_table();
        
        
        //Combination Chart
        $get_combination = $this->admin_model->get_combination();
        $series_combo[] = array('name' => 'Amount', 'type' => 'column', 'yAxis' => 1, 'data' => array(floatval($get_combination->Date1), floatval($get_combination->Date2), floatval($get_combination->Date3), floatval($get_combination->Date4), floatval($get_combination->Date5), floatval($get_combination->Date6)));
        $series_combo[] = array('name' => 'Load', 'type' => 'spline', 'data' => array(floatval($get_combination->Count1), floatval($get_combination->Count2), floatval($get_combination->Count3), floatval($get_combination->Count4), floatval($get_combination->Count5), floatval($get_combination->Count6)));
        $data['series_combo'] = json_encode($series_combo);


        $this->load->view('templates/header');
        $this->load->view('admins/dashboard', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function customer() {
        $this->load->view('templates/header');
        $this->load->view('admins/customer');
        $this->load->view('templates/footer');
    }

    public function getCustomerList() {
        $data = $this->repository_model->getCustomerList();
        echo json_encode($data);
    }

    function insert_customer() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_customer();
        redirect('admins/customer');
    }

    
    public function harvest() {
        $data['getUsers'] = $this->repository_model->getUser();
        $data['getPrice'] = $this->repository_model->getPrice();
        
        $this->load->view('templates/header');
        $this->load->view('admins/harvest',$data);
        $this->load->view('templates/footer');
    }

    public function getHarvestList() {
        $data = $this->repository_model->getHarvestList();
        echo json_encode($data);
    }

    function insert_harvest() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_harvest();
        redirect('admins/harvest');
    }
    
    public function transaction() {
        $data['getUsers'] = $this->repository_model->getUser();
        $data['getPrice'] = $this->repository_model->getPrice();
        $data['getCustomer'] = $this->repository_model->getCustomer();
        
        $this->load->view('templates/header');
        $this->load->view('admins/transaction',$data);
        $this->load->view('templates/footer');
    }

    public function getTransactionList() {
        $data = $this->repository_model->getTransactionList();
        echo json_encode($data);
    }

    function insert_transaction() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->insert_transaction();
        redirect('admins/transaction');
    }
    
     public function branch_assign() {
        $data['getUsers'] = $this->repository_model->getUser();
        $data['getBranchList'] = $this->repository_model->getBranchList();
        
        $this->load->view('templates/header');
        $this->load->view('admins/branch_assign',$data);
        $this->load->view('templates/footer');
    }

    public function getBranchAssignList() {
        $data = $this->repository_model->getBranchAssignList();
        echo json_encode($data);
    }

    function assign_branch() { //insert record method
        $this->session->set_flashdata('success', 'You have been added successfully');
        $this->admin_model->assign_branch();
        redirect('admins/user');
    }
    
    
    public function reports() {
//        $data['getUsers'] = $this->repository_model->getUser();
//        $data['getPrice'] = $this->repository_model->getPrice();
        $data['getBranchList'] = $this->repository_model->getBranchList();
        
        $this->load->view('templates/header');
        $this->load->view('admins/reports',$data);
        $this->load->view('templates/footer');
    }
    
    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('accounts/');
        }
    }
}
