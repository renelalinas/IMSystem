<?php

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('pdf');
        //$this->check_isvalidated();
    }

    public function summary_report() {

        $data['getBranchList'] = $this->repository_model->getBranchList();
        
        $this->load->view('templates/header');
        $this->load->view('reports/summary_report',$data);
        $this->load->view('templates/footer');
    }
    
    public function summary_pdfdetails() {

     
        
        $date_from = $this->input->post('datepicker_start');
        $date_to = $this->input->post('datepicker_end');
        $branch = $this->input->post('branchID');
        
      

        $sd = DateTime::createFromFormat("Y-m-d", $date_from);
        $from = date_format($sd,'Y/m/d');
        
        $sd = DateTime::createFromFormat("Y-m-d", $date_to);
        $to = date_format($sd,'Y/m/d');
      
        $customer_id = 1;
//        $html_content = '<div align="center">';
//        $html_content .= '<h3 style="margin: -10 0 5 0" align="center"><img src="' . base_url() . 'assets/img/logo.png" alt=""></h3>';
//        $html_content .= '<h3 style="margin: -10 0 -10 0" align="center">' . $reserveinfo->Address . '</h3>';
//        $html_content .= '<h3 style="margin: -10 0 -10 0" align="center">' . $reserveinfo->ContactNumber . '</h3>';
//        $html_content .= '</div>';

        $html_content = '<div align="center">';
        $html_content .= '<h3 style="margin: -10 0 5 0" align="center"><img src="' . base_url() . 'assets/img/logo.png" alt=""></h3>';
        $html_content .= '<h3 style="margin: -10 0 -10 0" align="center">BRANCH NAME</h3>';
//        $html_content .= '<h3 align="center">+01 234 567 89</h3>';
        $html_content .= '</div>';
      
        
        $html_content .= '<div align="right">';
        $html_content .= '<h4>Date: '. $from  . ' - ' . $to . '</h4>';
        $html_content .= '</div>';
        
        $html_content .= $this->report_model->get_summary_data($date_from, $date_to,$branch);
        
        
        $html_content .= '<br><br>';
        $html_content .= '<p style="margin: 0 0 0 0">Harvest:</p>';
        $html_content .= '<p style="margin: 0 0 0 0">Harvest Sales:</p>';
        $html_content .= '<p style="margin: 0 0 0 0">Less Sales:</p>';
        $html_content .= '<p style="margin: 0 0 0 0">Total Sales:</p>';
        
        

        $html_content .= '<br><br>';
        $html_content .= '<p> Prepared By: </p>';
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream("" . $customer_id . ".pdf", array("Attachment" => 0));
    }
    
}
