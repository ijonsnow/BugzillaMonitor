<?php
include("DBconfig.php");
include("TicketDownloadClass.php");
//$TicketTimerDownload=new TicketDownload($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),'','');
$TicketTimerDownload=new TicketDownload($dbHost,$dbUser,$dbPwd,$dbName,'2012-09-07','','');
$result=$TicketTimerDownload->ExportToCSV();
?>