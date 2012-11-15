<?php
//include("AuditHistory.php");
include("DBconfig.php");
include("AuditDownloadClass.php");
$AuditTimerDownload=new AuditDownload($dbHost,$dbUser,$dbPwd,$dbName,'',date('Y-m-d'),'','');
$result=$AuditTimerDownload->ExportToCSV();
?>