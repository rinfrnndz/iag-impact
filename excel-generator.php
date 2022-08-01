<?php include 'server.php';
    error_reporting(0);
    session_start();

    $program_admin = $_SESSION['username'];
    //$actvtyID = $_POST['act_id'];
    //$activitydate = $_POST['activity_date'];

    if(isset($_POST['export_in_excel'])) {
        $excel_sql = "SELECT *
                      FROM projectcode pj
                      INNER JOIN activities ac ON ac.projects_id = pj.projects_id
                      INNER JOIN participants re ON re.act_id = ac.id
                      WHERE pj.project_code='$program_admin'
                      ORDER BY re.id DESC ";
       
        $excel_result = mysqli_query($connect, $excel_sql);

        if(mysqli_num_rows($excel_result) > 0) {
            $excel_output .='
                
                <table class="excel_table" style="font-family:Helvetica; border:0.9px solid gray;">
                <tr><td></td></tr>
                    <tr style="border:0.9px solid gray; width:auto;">
                        <th style="text-align:center; font-weight:bold;">No.</th>
                        <th colspan="2" style="text-align:center; font-weight:bold;">Name</th>
                        <th style="text-align:center; font-weight:bold;">Age</th>
                        <th style="text-align:center; font-weight:bold;">Gender</th>
                        <th style="text-align:center; font-weight:bold;">City/Municipality</th>
                        <th style="text-align:center; font-weight:bold;">Province</th>
                        <th style="text-align:center; font-weight:bold;">Contact No.</th>
                        <th style="text-align:center; font-weight:bold;">Email Address</th>
                        <th style="text-align:center; font-weight:bold;">Organization</th>
                        <th style="text-align:center; font-weight:bold;">Signature</th>
                    </tr>
            ';
            $no = 1;
            while($excel_row = mysqli_fetch_array($excel_result)) {
                $excel_output .='
                    <tr>
                        <td style="text-align:center;">'.$no.'</td>
                        <td>'.$excel_row["firstname"].'</td>
                        <td>'.$excel_row["lastname"].'</td>
                        <td>'.$excel_row["agerange"].'</td>
                        <td>'.$excel_row["gender"].'</td>
                        <td>'.$excel_row["city_municipality"].'</td>
                        <td>'.$excel_row["province"].'</td>
                        <td>'.$excel_row["mobileno"].'</td>
                        <td>'.$excel_row["email"].'</td>
                        <td>'.$excel_row["org_office"].'</td>
                        <td></td>
                        
                    </tr>
                ';
                $no ++;
            }
            $excel_output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Attendance Sheet.xls");
            echo $excel_output;
            
        }
    }

?>