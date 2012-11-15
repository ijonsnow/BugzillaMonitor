<html>
<?php
include("DBconfig.php");
include("AuditClass.php");
include("TicketClass.php");
include("ProfileClass.php");
$AuditEntries=new AuditLog($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),'','');
$ProfileEntries=new ProfileActivity($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),"","");
$TicketEntries=new TicketLog($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),"","");
include("header.php");
?>
    <script type="text/javascript">
       $(document).ready( function () {
			Index=setTimeout(function(){window.location.href=document.URL;},180000);		
	  } );    
    </script> 
 <body>
  <form method="post">
   <?php 
		include("Menu.php"); 
   ?>   
   
   <div id="Header"> </div>
   <footer class="Entries">
		<div class="EntriesBody"> 
			<div class="EntriesHead"><div>Activity Entries of today</div></div><br/>
			<div class="EntriesRow"> <div>Audit Entries:<?php $AuditEntries->AuditEntriesCount(); ?></div></div>
			<div class="EntriesRow"> <div>Ticket Entries:<?php $TicketEntries->TicketEntriesCount();?></div></div>
			<div class="EntriesRow"> <div>Profile Entries:<?php  $ProfileEntries->ProfileEntriesCount();?></div></div>
	   </div>		   
   </footer>
  </form>	 
 </body> 
</html>

