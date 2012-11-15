<?php
	
  Class ProfileActivity
  {
	Private $DB;
	Private $Dte;
	Private $FromDate;
	Private $ToDate;
	public function __Construct($dbHost,$dbUser,$dbPwd,$dbName,$Date,$fromDate,$toDate)
	{
		$Db=new DbConnection($dbHost,$dbUser,$dbPwd,$dbName);
		$this->DB=$Db->SelectDb();  						
		if(!empty($toDate))
		{						
			$this->FromDate=gmdate($fromDate);	
			$this->ToDate=gmdate($toDate);	
		//	echo $this->FromDate;//.$this->ToDate;
		}
		else
		{
		    $this->Dte=gmdate($Date);
		//	echo $this->Dte;
		}
	}
	Private function ProfileTodayDate()
	{
		return mysql_query("SELECT t2.realname,t1.who,t1.profiles_when,t1.fieldid,t1.oldvalue,t1.newvalue FROM profiles_activity AS t1 Inner JOIN profiles AS t2 ON t1.userid = t2.userid and t1.profiles_when >= '$this->Dte' ORDER BY t1.profiles_when DESC Limit 0,500");
	}
	Private function ProfileRangeDate()
	{
	  	return mysql_query("SELECT t2.realname,t1.who,t1.profiles_when,t1.fieldid,t1.oldvalue,t1.newvalue FROM profiles_activity AS t1 Inner JOIN profiles AS t2 ON t1.userid = t2.userid and t1.profiles_when Between '$this->FromDate' and '$this->ToDate' ORDER BY t1.profiles_when DESC Limit 0,500" );		
	}
	public function ProfileEntriesCount()
	{
	  if($this->DB>0)	
		{ 
			$result=mysql_query("SELECT * FROM profiles_activity where profiles_when >= '$this->Dte'");
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
			$result=$this->ProfileRangeDate();
			return $result;		

		 }
		 else
		 {
			$result=$this->ProfileTodayDate();
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

