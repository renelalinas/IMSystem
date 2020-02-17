<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($msg = NULL) {
        // Load our view to be displayed
        // to the user
        if ($this->session->userdata('userrole')) {
            redirect('admins/index');
        } else {
            $data['msg'] = $msg;
            $this->load->view('templates/header');
            $this->load->view('login/login_view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function process() {
        // Load the model
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if (!$result) {
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        } else {
            if ($this->session->userdata('userrole') == 'Admin1') {
                redirect('admins/index');
            } elseif ($this->session->userdata('userrole') == 'Admin2') {
                redirect('admins/approvedlist');
            }
            // If user did validate,
            // Send them to members area
        }
    }

}

?>
