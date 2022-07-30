<?php include 'server.php';
    error_reporting(0);
    session_start();

    $program_admin = $_SESSION['username'];
    //$actvtyID = $_POST['act_id'];
    //$activitydate = $_POST['activity_date'];

    if(isset($_POST['export_in_excel'])) {
        $excel_sql = "SELECT *
                      from projectcode pj
                      inner join activities ac on ac.projects_id = pj.projects_id
                      inner join participants re on re.act_id = ac.id
                      where pj.project_code='$program_admin' ";
       
        $excel_result = mysqli_query($connect, $excel_sql);

        if(mysqli_num_rows($excel_result) > 0) {
            $excel_output .='
                
                <table class="excel_table" style="font-family:Calibri; border: 0px solid gray;">
                <tr><td></td></tr>
                    <tr>
                        <th></th>
                        <th>No.</th>
                        <th colspan="2">Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>City/Municipality</th>
                        <th>Province</th>
                        <th>Contact No.</th>
                        <th>Email Address</th>
                        <th>Organization</th>
                    </tr>
            ';
            $no = 1;
            while($excel_row = mysqli_fetch_array($excel_result)) {
                $excel_output .='
                    <tr>
                        <td></td>
                        <td>'.$no.'</td>
                        <td>'.$excel_row["firstname"].'</td>
                        <td>'.$excel_row["lastname"].'</td>
                        <td>'.$excel_row["agerange"].'</td>
                        <td>'.$excel_row["gender"].'</td>
                        <td>'.$excel_row["city_municipality"].'</td>
                        <td>'.$excel_row["province"].'</td>
                        <td>'.$excel_row["mobileno"].'</td>
                        <td>'.$excel_row["email"].'</td>
                        <td>'.$excel_row["org_office"].'</td>
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