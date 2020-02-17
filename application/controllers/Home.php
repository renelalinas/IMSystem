<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function setnull() {
        $data = array(
            'Reg-FirstName' => '',
            'Reg-LastName' => '',
            'Reg-ContactNumber' => '',
            'Reg-EmailAddress' => '',
            'Reg-UserName' => '',
            'Reg-Password' => '',
            'Reg-Age' => '',
            'Reg-MiddleName' => '',
            'Reg-Sex' => '',
            'Reg-Birthday' => '',
            'Reg-City' => '',
            'Reg-Province' => '',
            'Reg-Postal' => ''
        );

        $this->session->set_userdata($data);
    }

    public function index() {
        $this->setnull();
        if ($this->session->userdata('EmployeeID'))
        {
            $data['history_data'] = $this->repository_model->get_history($this->session->userdata('EmployeeID')); 
        }
        
        $data['homesetting'] = $this->repository_model->get_homesettings();
        $data['services'] = $this->repository_model->get_services();
        $data['promotions'] = $this->repository_model->get_promotions();
        $this->load->view('home/index', $data);
    }

    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }

    public function do_logout() {
        $this->session->sess_destroy();
        redirect('home/index');
    }

    public function searchentry() {

        $data['searchInfo'] = $this->repository_model->get_searchEntry();
        $this->load->view('templates/header');
        $this->load->view('home/searchentry', $data);
        $this->load->view('templates/footer');
    }

    /* End of Admin View */

    /* Initilizing Pagination */

    public function initialize_function($baseurl, $allrecord) {
        $paging = array();
        $paging['base_url'] = $baseurl;
        $paging['total_rows'] = $allrecord;
        $paging['per_page'] = 5;
        $paging['uri_segment'] = 4;
        $paging['num_links'] = 5;
        $paging['first_link'] = 'First';
        $paging['first_tag_open'] = '<li>';
        $paging['first_tag_close'] = '</li>';
        $paging['num_tag_open'] = '<li>';
        $paging['num_tag_close'] = '</li>';
        $paging['prev_link'] = 'Prev';
        $paging['prev_tag_open'] = '<li>';
        $paging['prev_tag_close'] = '</li>';
        $paging['next_link'] = 'Next';
        $paging['next_tag_open'] = '<li>';
        $paging['next_tag_close'] = '</li>';
        $paging['last_link'] = 'Last';
        $paging['last_tag_open'] = '<li>';
        $paging['last_tag_close'] = '</li>';
        $paging['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $paging['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($paging);
    }

    public function sample() {
        $this->load->view('home/sample');
    }

}
