<?php
//include("AuditHistory.php");
include("DBconfig.php");
include("ProfileDownloadClass.php");
$from_date=$_GET['Pfdate'];
$to_date=$_GET['Ptdate'];
$TicketHistoryDownload=new ProfileDownload($dbHost,$dbUser,$dbPwd,$dbName,'',$from_date,$to_date);
$result=$TicketHistoryDownload->ExportToCSV();
?> 
