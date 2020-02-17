<?php

class Repository_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getBranchList() {
        $query = $this->db->get('branch_tbl');
        return $query->result_array();
    }

    function getIncidentCategory() {
        $query = $this->db->get('category_incident');
        return $query->result_array();
    }
    
    function getCustomer() {
        $query = $this->db->get('customer_tbl');
        return $query->result_array();
    }

    function getUser() {
        $query = $this->db->query("SELECT 
                            userID,
                            userName,
                            userPassword,
                            firstName,
                            middleName,
                            lastName,
                            birthDate,
                            userAddress,
                            contactNumber,
                            userRole,
                            branchName
                        FROM user_tbl A
                        LEFT JOIN branch_tbl B ON
                        A.branchID=B.branchID
                        WHERE userRole!= 'Admin'");
        return $query->result_array();
    }

    public function get_homesettings() {
        $query = $this->db->get('settings');
        return $query->row_Array();
    }

    public function get_assign_branch($id) {
        $query = $this->db->query("SELECT 
                branchName,
                A.branchID FROM branch_tbl A
            INNER JOIN branch_owner B 
                ON A.branchID=B.branchID
            WHERE 
                userID='$id'");
        return $query->result_array();
    }
    
    public function getID(){
        $query = $this->db->query("SELECT 
                CONCAT(REPLACE(DATE(NOW()), '-', ''),
                        '-',
                        LPAD(CONVERT( SUBSTRING(incidentID, - 4, 4) , SIGNED) + 1,
                                4,
                                '0000')) AS ID
            FROM
                db_iceplant.incident_tbl
            ORDER BY createdDate DESC 
            LIMIT 1");
        return $query->row_Array();
    }
    
    public function getUserID(){
        $query = $this->db->query("SELECT 
                LPAD(CONVERT( SUBSTRING(userID, - 4, 4) , SIGNED) + 1,
                        4,
                        '0000') AS ID
            FROM
                db_iceplant.user_tbl
            ORDER BY createdDate DESC
            LIMIT 1");
        return $query->row_Array();
    }
    
    
    public function getCustomerList() {
        $query = $this->db->get('customer_tbl');
        return $query->result_array();
    }
    
    public function getHarvestList() {
        $query = $this->db->query("SELECT 
                    harvestID,
                    harvestDateTime,
                    harvestCount,
                    harvestAmount,
                    (harvestAmount * harvestCount) AS harvestPrice,
                    harvestDescription,
                    userName,
                    branchName
                FROM
                    db_iceplant.havest_tbl A
                        INNER JOIN
                    user_tbl B ON A.userID = B.userID
                        INNER JOIN
                    branch_tbl C ON A.branchID = C.branchID");
        return $query->result_array();
    }
    
    public function getPrice(){
        $query = $this->db->query("SELECT 
                price
            FROM
                db_iceplant.settings_tbl
            ORDER BY createdDate DESC");
        return $query->row_Array();
    }
    
    public function getTransactionList() {
        $query = $this->db->query("SELECT 
                    transactionID,
                    transactionDateTime,
                    itemCount,
                    transactionAmount ,
                    transactionDescription,
                    customerFullName,
                    userName,
                    branchName
                FROM
                    db_iceplant.transaction_tbl A
                        INNER JOIN
                    user_tbl B ON A.userID = B.userID
                        INNER JOIN
                    branch_tbl C ON A.branchID = C.branchID
                                INNER JOIN
                    customer_tbl D ON A.customerID = D.customerID");
        return $query->result_array();
    }
    
    public function getBranchAssignList() {
        $query = $this->db->query("SELECT 
                    branchAssignID,
                    CONCAT(firstName, ' ', lastName) AS userName,
                    branchName,
                    userRole
                FROM
                    branch_owner A
                        INNER JOIN
                    user_tbl B ON A.userID = B.userID
                        INNER JOIN
                    branch_tbl C ON A.branchID = C.branchID");
        return $query->result_array();
    }

}
