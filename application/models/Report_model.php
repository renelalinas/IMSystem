<?php

class Report_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function get_summary_data($date_from, $date_to,$branch) {     
        $total = 0;
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
                    customer_tbl D ON A.customerID = D.customerID
                    WHERE 
                    (DATE_FORMAT(transactionDateTime, '%Y-%m-%d') >= '$date_from' AND 
                    DATE_FORMAT(transactionDateTime, '%Y-%m-%d') >= '$date_from' )
                     AND A.BranchID ='$branch' ORDER BY transactionDateTime DESC");

        $output = '<table style = "width:100%; border-collapse:collapse;">
        <tr >
        <th style="border-bottom: 2px solid black">Transaction ID</th>
        <th style="border-bottom: 2px solid black">Customer Name</th>
        <th style="border-bottom: 2px solid black">Date and Time</th>
        <th style="border-bottom: 2px solid black">Loads</th>
        <th align = "right" style="border-bottom: 2px solid black">Amount</th>
        </tr>';

        foreach ($query->result_array() as $row) {
            $output .= '<tr>
        <td style="padding:3px;">' . $row["transactionID"] . '</td>
        <td style="padding:3px;">' . $row["customerFullName"] . ' </td>
        <td style="padding:3px;">' . $row["transactionDateTime"] . ' </td>
        <td style="padding:3px;">' . $row["itemCount"] . ' </td>
        <td align = "right" style="padding:3px;">' . number_format($row["transactionAmount"], 2, '.', ',') . '</td>
        </tr>';
            $total = $total + $row["transactionAmount"];
        }
        $output .= '
        
        <tr>
        <td style="padding:3px;" colspan = "4" align = "right"></td>
        <td style="padding:3px;border-top: 1px solid black;" colspan = "1" align = "right"></td>
        </tr>
        
        <tr>
        <td style="padding:3px;" colspan = "4" align = "right"><b>Grand Total: </b></td>
        <td style="padding:3px;border-top: 1px solid black;" colspan = "1" align = "right"><b>' . number_format($total, 2, '.', ',') . '</b></td>
        </tr>
        
        </table>';

        return $output;
    }

   

}
