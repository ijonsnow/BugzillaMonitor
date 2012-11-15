<?php
//include("AuditHistory.php");
include("DBconfig.php");
include("TicketDownloadClass.php");
$from_date=$_GET['Tfdate'];
$to_date=$_GET['Ttdate'];
$TicketHistoryDownload=new TicketDownload($dbHost,$dbUser,$dbPwd,$dbName,'',$from_date,$to_date);
$result=$TicketHistoryDownload->ExportToCSV();
?> 
