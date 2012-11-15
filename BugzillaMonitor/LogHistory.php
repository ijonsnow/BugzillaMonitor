
<?php
 include("DBconfig.php");
 include("AuditClass.php");
 include("ProfileClass.php");
 include("TicketClass.php");
 $from_Date=$_POST['TFromDate'];
 $to_Date=$_POST['TToDate'];
 $table=$_POST['tableModules'];
 if(!empty($from_Date))
 {
	if(!empty($to_Date))
	{
	 if(empty($table))
	 {
		$error="* fields are mandatory";
		header("Location:History.php?err=$error");
	 }
	 
     else
	 {
	  if($table=="Audit")
	  {
		header("Location:AuditHistory.php?fdate=$from_Date&tdate=$to_Date");
	  }
	   else if($table=="Ticket")
	  {
		header("Location:TicketHistory.php?fdate=$from_Date&tdate=$to_Date");
	  }
	  else if($table=="Profile")
	  {
		header("Location:ProfileHistory.php?fdate=$from_Date&tdate=$to_Date");
	  }
	  else
	  {
		$error="table is not found";
		header("Location:History.php?err=$error");
	  }
    }
   }
   else
   {
     $error="* fields are mandatory";
	 header("Location:History.php?err=$error");
   }
 }
else
{
  $error="* fields are mandatory";
  header("Location:History.php?err=$error");
} 
?>


