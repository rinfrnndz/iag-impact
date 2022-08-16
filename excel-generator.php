<?php include 'server.php';
    error_reporting(0);
    session_start();

    $program_admin = $_SESSION['username'];
    $actvty_ID = $_GET['id'];
    //$activitydate = $_POST['activity_date'];

    if(isset($_POST['export_in_excel'])) {
        $excel_sql = "SELECT *
                      FROM projectcode pj
                      INNER JOIN activities ac ON ac.projects_id = pj.projects_id
                      INNER JOIN participants re ON re.act_id = ac.id
                      WHERE pj.project_code='$program_admin' 
                      ORDER BY re.id DESC "; //pj.project_code='$program_admin' // re.act_id='$actvty_ID' &&
       
        $excel_result = mysqli_query($connect, $excel_sql);

        if(mysqli_num_rows($excel_result) > 0) {
            $excel_output .='
            <table class="excel_table" style="font-family:Calibri; border:1px solid #1f004d;">
            <tr><td></td></tr>
                <tr>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">No.</th>
                    <th colspan="2" style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Name</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Age</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Gender</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">City/Municipality</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Province</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Contact No.</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Email Address</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Organization</th>
                    <th style="text-align:center; font-weight:bold; border:1px solid #1f004d; ">Signature</th>
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