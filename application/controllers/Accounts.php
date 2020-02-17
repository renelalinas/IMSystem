<?php

class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($msg = NULL) {
        $data['msg'] = $msg;
        $this->load->view('accounts/login_view', $data);
    }

    public function process() {
        // Load the model
        // Validate the user can login
        $result = $this->accounts_model->validate();
        
        if (!$result) {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        } else {           
            $this->session->set_flashdata('success', 'You have log in successfully');
            redirect('admins/dashboard');           
        }
    }   

}
