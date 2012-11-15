<?php
//include("AuditHistory.php");
include("DBconfig.php");
include("ProfileDownloadClass.php");
$ProfileTimerDownload=new ProfileDownload($dbHost,$dbUser,$dbPwd,$dbName,'',date('Y-m-d'),'','');
$result=$ProfileTimerDownload->ExportToCSV();
?>