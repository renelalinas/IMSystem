<?php

class Accounts_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_profile() {
        $query = $this->db->get_where('accounts', array('EmployeeID' => $this->session->userdata('EmployeeID')));
        return $query->row_Array();
    }

    function update_profile() {
        $EmployeeID = $this->session->userdata('EmployeeID');
        $birthday = $this->input->post("Birthday");
        $data = array(
            'FirstName' => $this->input->post('FirstName'),
            'MiddleName' => $this->input->post('MiddleName'),
            'LastName' => $this->input->post('LastName'),
            'Birthday' => $birthday,
            'ContactNumber' => $this->input->post('ContactNumber'),
            'EmailAddress' => $this->input->post('EmailAddress'),
            'Age' => $this->input->post('Age'),
            'Sex' => $this->input->post('Sex'),
            'UserName' => $this->input->post('UserName'),
            'Password' => $this->input->post('Password'),
            'City' => $this->input->post('City'),
            'Province' => $this->input->post('Province'),
            'Postal' => $this->input->post('Postal')
                // 'Photo' => $this->input->post('Photo_update')
        );
        $this->db->where('EmployeeID', $EmployeeID);
        $result = $this->db->update('accounts', $data);
        return $result;
    }

    public function validate() {
        // grab user input
        $UserName = $this->security->xss_clean($this->input->post('userName'));
        $Password = $this->security->xss_clean($this->input->post('userPassword'));

        // Prep the query
        $this->db->where('userName', $UserName);
        $this->db->where('userPassword', $Password);

        // Run the query
        $query = $this->db->get('user_tbl');
        // Let's check if there are any results
        if ($query->num_rows() == 1) {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                'userID' => $row->userID,
                'firstName' => $row->firstName,
                'lastName' => $row->lastName,
                'userRole' => $row->userRole,
                'userName' => $row->userName,
                'userPassword' => $row->userPassword,
                'branchID' => $row->branchID,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

}
