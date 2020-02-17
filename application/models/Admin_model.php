<?php

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function get_all_status_count($status) {
        $query = $this->db->query('SELECT 
    SUM(WALKIN) AS WALKIN, SUM(GUEST) AS GUEST
FROM
    (SELECT 
        CASE
                WHEN EmployeeID = 3 THEN 1
                ELSE 0
            END AS WALKIN,
            CASE
                WHEN EmployeeID != 3 THEN 1
                ELSE 0
            END AS GUEST
    FROM
        reservations
    WHERE  Status = ' . "'" . $status . "'" . ' ) RAW_DATA');
        $ret = $query->row();
        return $ret;
    }
    
    function get_incident() {
        $query = $this->db->query("SELECT 
                        A.incidentID,
                        A.incidentDescription,
                        incidentName,
                        incidentDateTime,
                        CONCAT(firstName, ' ', lastName) AS fullName,
                        userRole,
                        branchName,
                        incidentStatus
                    FROM
                        db_iceplant.incident_tbl A
                            INNER JOIN
                        incident_status B ON A.incidentID = B.incidentID
                            INNER JOIN
                        category_incident C ON A.incidentCategoryID = C.incidentCategoryID
                            INNER JOIN
                        user_tbl D ON D.userID = B.userID
                            INNER JOIN
                        branch_tbl E ON A.branchID = E.branchID
                        WHERE incidentStatus ='PENDING'");
        return $query->result_array();
    }

    function add_incident() {
        $data = array(
            'incidentID' => $this->input->post('incidentID'),
            'incidentCategoryID' => $this->input->post('incidentCategoryID'),
            'incidentDescription' => $this->input->post('incidentDescription'),
            'branchID' => $this->input->post('branchID')
        );
        $result = $this->db->insert('incident_tbl', $data);

        $date = $this->input->post('datepicker');
        $time = $this->input->post('timepicker');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $data = array(
            'incidentID' => $this->input->post('incidentID'),
            'incidentStatus' => 'PENDING',
            'incidentDateTime' => $combinedDT,
            'userID' => $this->input->post('userID')
        );
        $result = $this->db->insert('incident_status', $data);

        return $result;
    }

    function edit_incident() {

        $date = $this->input->post('datepicker-edit');
        $time = $this->input->post('timepicker-edit');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));


        $this->db->set('incidentDescription', $this->input->post('incidentDescription-edit'));
        $this->db->where('incidentID', $this->input->post('incidentID-edit'));
        $this->db->update('incident_tbl');

        $this->db->set('incidentDateTime', $combinedDT);
        $this->db->where('incidentID', $this->input->post('incidentID-edit'));
        $this->db->where('incidentStatus', 'PENDING');
        $this->db->update('incident_status');

        return $result = true;
    }

    function update_incident_status() {

        $date = $this->input->post('datepicker');
        $time = $this->input->post('timepicker');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $data = array(
            'incidentID' => $this->input->post('incidentID'),
            'incidentStatus' => $this->input->post('incidentStatus'),
            'incidentDateTime' => $combinedDT,
            'userID' => $this->input->post('userID')
        );
        $result = $this->db->insert('incident_status', $data);
        return $result;
    }

    function insert_incident() {
        $data = array(
            'incidentDescription' => $this->input->post('incidentDescription'),
            'incidentName' => $this->input->post('incidentName'),
            'idTag' => $this->input->post('idTag')
        );
        $result = $this->db->insert('category_incident', $data);
        return $result;
    }

    function get_latest_incident() {
        $query = $this->db->query("SELECT 
                        A.incidentID,
                        A.incidentDescription,
                        incidentName,
                        incidentDateTime,
                        CONCAT(firstName, ' ', lastName) AS fullName,
                        userRole,
                        branchName,
                        incidentStatus
                    FROM
                        db_iceplant.incident_tbl A
                            INNER JOIN
                        (SELECT 
                            i1.*
                        FROM
                            incident_status AS i1
                        LEFT JOIN incident_status AS i2 ON (i1.incidentID = i2.incidentID
                            AND i1.incidentDateTime < i2.incidentDateTime)
                        WHERE
                            i2.incidentDateTime IS NULL) B ON A.incidentID = B.incidentID
                            INNER JOIN
                        category_incident C ON A.incidentCategoryID = C.incidentCategoryID
                            INNER JOIN
                        user_tbl D ON D.userID = B.userID
                            INNER JOIN
                        branch_tbl E ON A.branchID = E.branchID");
        return $query->result_array();
    }

    function insert_branch() {
        $data = array(
            'branchName' => $this->input->post('branchName'),
            'houseNumber' => $this->input->post('houseNumber'),
            'Street' => $this->input->post('Street'),
            'City' => $this->input->post('City'),
            'Province' => $this->input->post('Province'),
            'Country' => $this->input->post('Country')
        );
        $result = $this->db->insert('branch_tbl', $data);
        return $result;
    }

    function insert_user() {
        $data = array(
            'userID' => $this->input->post('userID'),
            'userName' => $this->input->post('userName'),
            'userPassword' => $this->input->post('userPassword'),
            'firstName' => $this->input->post('firstName'),
            'middleName' => $this->input->post('middleName'),
            'lastName' => $this->input->post('lastName'),
            'birthDate' => $this->input->post('birthDate'),
            'userAddress' => $this->input->post('userAddress'),
            'contactNumber' => $this->input->post('contactNumber'),
            'userRole' => $this->input->post('userRole')
        );
        $result = $this->db->insert('user_tbl', $data);
        return $result;
    }

    function graphPie() {
        $query = $this->db->query("SELECT 
                    incidentStatus as name,
                    count(*) as y
                FROM
                    db_iceplant.incident_tbl A
                        INNER JOIN
                    (SELECT 
                        i1.*
                    FROM
                        incident_status AS i1
                    LEFT JOIN incident_status AS i2 ON (i1.incidentID = i2.incidentID
                        AND i1.incidentDateTime < i2.incidentDateTime)
                    WHERE
                        i2.incidentDateTime IS NULL) B ON A.incidentID = B.incidentID
                        INNER JOIN
                    category_incident C ON A.incidentCategoryID = C.incidentCategoryID
                        INNER JOIN
                    user_tbl D ON D.userID = B.userID
                        INNER JOIN
                    branch_tbl E ON A.branchID = E.branchID
                    WHERE incidentStatus NOT IN ('COMPLETED')
                    GROUP BY incidentStatus");
        return $query->result_array();
    }

    function graphLine() {
        $query = $this->db->query("SELECT 
                    incidentName,
                    SUM(DateFirst) AS DateFirst,
                    SUM(DateSecond) AS DateSecond,
                    SUM(DateThird) AS DateThird,
                    SUM(DateFourth) AS DateFourth,
                    SUM(DateFifth) AS DateFifth,
                    SUM(DateSixth) AS DateSixth
                FROM
                    (SELECT 
                        A.incidentID,
                            incidentName,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 MONTH), '%M %Y') THEN 1
                                ELSE 0
                            END DateFirst,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 MONTH), '%M %Y') THEN 1
                                ELSE 0
                            END DateSecond,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 MONTH), '%M %Y') THEN 1
                                ELSE 0
                            END DateThird,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 MONTH), '%M %Y') THEN 1
                                ELSE 0
                            END DateFourth,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH), '%M %Y') THEN 1
                                ELSE 0
                            END DateFifth,
                            CASE DATE_FORMAT(incidentDateTime, '%M %Y')
                                WHEN DATE_FORMAT(NOW(), '%M %Y') THEN 1
                                ELSE 0
                            END DateSixth
                    FROM
                        incident_tbl A
                    INNER JOIN incident_status B ON A.incidentID = B.incidentID
                    INNER JOIN category_incident C ON A.incidentCategoryID = C.incidentCategoryID
                    WHERE
                        incidentStatus = 'PENDING') raw_data
                GROUP BY incidentName");
        return $query->result_array();
    }

    public function get_date() {
        $query = $this->db->query('SELECT 
    DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 MONTH),"%M %Y") as data1,
    DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 MONTH),"%M %Y") as data2,
    DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 MONTH),"%M %Y") as data3,
    DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 MONTH),"%M %Y") as data4,
    DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH),"%M %Y") as data5,
    DATE_FORMAT(NOW(), "%M %Y")  as data6');
        $ret = $query->row();
        return $ret;
    }

    public function get_table() {
        $query = $this->db->query("SELECT 
                A.incidentID,
                A.incidentDescription,
                incidentName,
                incidentDateTime,
                CONCAT(DATEDIFF(NOW(),incidentDateTime),' day(s)') AS overDue,
                CONCAT(firstName, ' ', lastName) AS fullName,
                userRole,
                branchName,
                incidentStatus
            FROM
                db_iceplant.incident_tbl A
                    INNER JOIN
                (SELECT 
                    i1.*
                FROM
                    incident_status AS i1
                LEFT JOIN incident_status AS i2 ON (i1.incidentID = i2.incidentID
                    AND i1.incidentDateTime < i2.incidentDateTime)
                WHERE
                    i2.incidentDateTime IS NULL) B ON A.incidentID = B.incidentID
                    INNER JOIN
                category_incident C ON A.incidentCategoryID = C.incidentCategoryID
                    INNER JOIN
                user_tbl D ON D.userID = B.userID
                    INNER JOIN
                branch_tbl E ON A.branchID = E.branchID
                WHERE incidentStatus NOT IN ('COMPLETED')
                ORDER BY 5 DESC");
        return $query->result_array();
    }

    function insert_customer() {
        $data = array(
            'customerFullName' => $this->input->post('customerFullName'),
            'contactNumber' => $this->input->post('contactNumber'),
            'plateNumber' => $this->input->post('plateNumber'),
            'customerAddress' => $this->input->post('customerAddress')
        );
        $result = $this->db->insert('customer_tbl', $data);
        return $result;
    }

    function insert_harvest() {

        $date = $this->input->post('datepicker');
        $time = $this->input->post('timepicker');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $data = array(
            'harvestAmount' => $this->input->post('harvestAmount'),
            'harvestCount' => $this->input->post('harvestCount'),
            'harvestDateTime' => $combinedDT,
            'harvestDescription' => $this->input->post('harvestDescription'),
            'userID' => $this->input->post('userID'),
            'branchID' => $this->input->post('branchID')
        );
        $result = $this->db->insert('havest_tbl', $data);

        return $result;
    }

    function insert_transaction() {

        $date = $this->input->post('datepicker');
        $time = $this->input->post('timepicker');
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $data = array(
            'transactionAmount' => $this->input->post('transactionAmount'),
            'itemCount' => $this->input->post('itemCount'),
            'transactionDateTime' => $combinedDT,
            'transactionDescription' => $this->input->post('transactionDescription'),
            'customerID' => $this->input->post('customerID'),
            'userID' => $this->input->post('userID'),
            'branchID' => $this->input->post('branchID')
        );
        $result = $this->db->insert('transaction_tbl', $data);

        return $result;
    }

    public function get_combination() {
        $query = $this->db->query('SELECT  
                SUM(DateFirst) as Date1,
                SUM(DateSecond) as Date2,
                SUM(DateThird) as Date3,
                SUM(DateFourth) as Date4,
                SUM(DateFifth) as Date5,
                SUM(DateSixth) as Date6,
                SUM(Count1) as Count1,
                SUM(Count2) as Count2,
                SUM(Count3) as Count3,
                SUM(Count4) as Count4,
                SUM(Count5) as Count5,
                SUM(Count6) as Count6
            FROM
                    (SELECT 
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 MONTH),"%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateFirst,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 MONTH),"%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateSecond,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 MONTH),"%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateThird,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 MONTH),"%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateFourth,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH),"%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateFifth,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(NOW(), "%M %Y") 
                                    THEN transactionAmount ELSE 0
                            END DateSixth,

                    CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 MONTH),"%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count1,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 MONTH),"%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count2,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 MONTH),"%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count3,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 MONTH),"%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count4,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 MONTH),"%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count5,
                            CASE DATE_FORMAT(transactionDateTime, "%M %Y")
                                    WHEN DATE_FORMAT(NOW(), "%M %Y") 
                                    THEN itemCount ELSE 0
                            END Count6
                    FROM
                            transaction_tbl A) raw_data');
        $ret = $query->row();
        return $ret;
    }

    function assign_branch() {
        
     
        $this->db->set('branchID', $this->input->post('branchID'));
        $this->db->where('userID', $this->input->post('userID'));
        $this->db->update('user_tbl');

//        $id = md5($this->input->post('branchID') . $this->input->post('userID'));
//        $sql = "INSERT IGNORE INTO branch_owner (branchID, userID,branchAssignID) VALUES (" . $this->input->post('branchID') . ", '" . $this->input->post('userID') . "', '" . $id . "')";
//        $this->db->query($sql);
//        $result = $this->db->affected_rows();
        
        return true;
    }

}
