<?php

class Sample extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('sample/index', $data);
    }

  

}
