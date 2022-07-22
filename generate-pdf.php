<?php include 'server.php';

    error_reporting ();
    session_start ();

    if(!isset($_SESSION['username'])) {
    header ("location: login.php");
    }

    $progamadmin = $_SESSION['username'];
    $q = intval($_GET['q']);
?>

<!DOCTYPE html>
<html>
    
</html>