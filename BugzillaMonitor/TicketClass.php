<?php
 
  Class TicketLog
  {
	Private $DB;
	Private $Dte;
	public  static $TFromDate;
	public  static $TToDate;
	Private $FromDate;
	Private $ToDate;
	public function __Construct($dbHost,$dbUser,$dbPwd,$dbName,$Date,$fromDate,$toDate)
	{
		$Db=new DbConnection($dbHost,$dbUser,$dbPwd,$dbName);
		$this->DB=$Db->SelectDb();  						
		if(!empty($toDate))
		{					
			self::$TFromDate=gmdate($fromDate);	
			self::$TToDate=gmdate($toDate);	
		//	echo self::$TFromDate;
		//	echo self::$TToDate;
			$this->FromDate=gmdate($fromDate);	
			$this->ToDate=gmdate($toDate);	
			//echo $this->FromDate;
			//echo $this->ToDate;
		}
		else
		{
		    $this->Dte=gmdate($Date);
		//	echo $this->Dte;
		}
	}
	Private function BugTodayDate()
	{
		return mysql_query("SELECT * FROM `bugs_activity` WHERE `bug_when` >='$this->Dte' ORDER BY `bug_when` DESC Limit 0,500");
	}
	Private function BugRangeDate()
	{
	  	return mysql_query("SELECT * FROM `bugs_activity` WHERE `bug_when` Between '$this->FromDate' and '$this->ToDate' ORDER BY `bug_when` DESC Limit 0,500");
	}
		
	public function TicketEntriesCount()
	{
	  if($this->DB>0)	
		{ 
			$result=mysql_query("SELECT * from `bugs_activity` WHERE `bug_when` >='$this->Dte'");
			$nums=mysql_num_rows($result);
			echo $nums;	
		}
	}	
	Public function Display()
	{
	  if($this->DB>0)	
	   {
		 if(!empty($this->ToDate))
		 {	
			$result=$this->BugRangeDate();
			return $result;				

		 }
		 else
		 {
			$result=$this->BugTodayDate();
			return $result;			
		 } 
	    }
	    else
		{
			echo "<div>Database is not selected</div>";
		}
	}   
  
  }
 

?>