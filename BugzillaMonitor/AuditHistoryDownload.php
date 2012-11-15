<?php
//include("AuditHistory.php");
include("DBconfig.php");
include("AuditDownloadClass.php");
$from_date=$_GET['Afdate'];
$to_date=$_GET['Atdate'];
$AuditHistoryDownload=new AuditDownload($dbHost,$dbUser,$dbPwd,$dbName,'',$from_date,$to_date);
$result=$AuditHistoryDownload->ExportToCSV();
?>
