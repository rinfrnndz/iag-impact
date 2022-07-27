<?php include 'server.php';
    error_reporting(0);
    session_start();

    $program_admin = $_SESSION['username'];
    //$actvtyID = $_POST['act_id'];
    //$activitydate = $_POST['activity_date'];

    if(isset($_POST['export_in_excel'])) {
        $excel_sql = "SELECT * FROM projectcode projcode, activities acty, participants p WHERE projcode.projects_id=acty.projects_id AND projcode.project_code='$program_admin' AND acty.id=p.act_id GROUP BY p.act_id ";
        $excel_result = mysqli_query($connect, $excel_sql);

        if(mysqli_num_rows($excel_result) > 0) {
            $excel_output .='
                <table class="excel_table" style="font-family:Calibri; border: 0px solid gray;">
                    <tr>
                        <th>No.</th>
                        <th>Activity Title</th>
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
                        <td>'.$no.'</td>
                        <td>'.$programadmin.'</td>
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

    /*$filename = "participants_".time().".csv";
    $where = "";

    if(isset($_POST['from_date']) && isset($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        $where = "where activity_date between '".$from_date."' and '".$to_date."' ";
    }

    $records = mysqli_query($connect,"SELECT * FROM projectcode projcode, activities acty, participants p WHERE projcode.projects_id=acty.projects_id AND '.$where.' ORDER BY p.id ASC ");
    $participants_array = array();

    $file = fopen($filename,"w");

    $participants_array = array("firstname","lastname","agerange","gender","city_municipality","province","mobileno","email","org_office","activity_date");
    fputcsv($file, $participants_array);

    while($row = mysqli_fetch_assoc($records)) {
        $participants_fname = $row['firstname'];
        $participants_lname = $row['lastname'];
        $participants_age = $row['agerange'];
        $participants_gender = $row['gender'];
        $participants_ethnic = $row['ethnicity'];
        $participants_c_m = $row['city_municipality'];
        $participants_province = $row['province'];
        $participants_mobile_no = $row['mobileno'];
        $participants_email = $row['email'];
        $participants_office = $row['org_office'];
        $participants_position = $row['position'];
        $activity_date = $row['activity_date'];
        
        $participants_array = array($participants_fname,$participants_lname,$participants_age,$participants_gender,$participants_c_m,$participants_province,$participants_mobile_no,$participants_email,$participants_office,$activity_date);
    
        fputcsv($file,$participants_array);

    }
    fclose($file);
    header("Content-Type: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv;");

    readfile($filename);*/

/*if(isset($_POST['export_in_excel'])) {
$date1=$_POST['from_date'];
$date2=$_POST['to_date'];
$SQL = "SELECT * FROM projectcode projcode, activities acty, participants p WHERE projcode.projects_id=acty.projects_id  DATE(date_registered) BETWEEN '$date1' AND '$date2'";
$header = '';
$result ='';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ ) {
    $header .= mysql_field_name( $exportData , $i ) . "\t";
}
while( $row = mysql_fetch_row( $exportData ) ) {
    $line = '';
    foreach( $row as $value ) {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) ) {
            $value = "\t";
        }
        else {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" ) {
    $result = "\nNo Record(s) Found!\n";                        
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$result";
}*/
?>