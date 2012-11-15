<?php
   class AuditLog 
	{
		private $DB;
		private $Dte;
		private $FromDate;
		private $ToDate;	
		public function __Construct($dbHost,$dbUser,$dbPwd,$dbName,$Date,$fromDate,$toDate)
		{
			$Db=new DbConnection($dbHost,$dbUser,$dbPwd,$dbName);
			$this->DB=$Db->SelectDb();  						
			if(!empty($toDate))
			{						
				$this->FromDate=gmdate($fromDate);	
				$this->ToDate=gmdate($toDate);	
			}
			else
			{
			    $this->Dte=gmdate($Date);								
				//echo $this->Dte;
			}
		}
		private function AuditTodayDate()
		{
			return mysql_query("SELECT t2.realname,t1.class,t1.object_id,t1.field,t1.removed,t1.added,t1.at_time FROM audit_log AS t1 Inner JOIN profiles AS t2 ON t1.user_id = t2.userid and t1.at_time >= '$this->Dte' ORDER BY t1.at_time DESC Limit 0,500");
		}
		private function AuditRangeDate()
		{
			return mysql_query("SELECT t2.realname,t1.class,t1.object_id,t1.field,t1.removed,t1.added,t1.at_time FROM audit_log AS t1 Inner JOIN profiles AS t2 ON t1.user_id = t2.userid and t1.at_time Between '$this->FromDate' and '$this->ToDate' ORDER BY t1.at_time DESC Limit 0,500");
		}
		public function AuditEntriesCount()
		{
		  if($this->DB>0)	
			{ 
				$result=mysql_query("SELECT * FROM audit_log where at_time >='$this->Dte'");
				$nums=mysql_num_rows($result);
				echo $nums;				
			}
		}
			
		public function Display()
		{
		  if($this->DB>0)	
			{
				if(!empty($this->ToDate))
				{	
					$result=$this->AuditRangeDate();
					return $result;
				}
				else
				{				 
					$result=$this->AuditTodayDate();
					return $result;							
				}
			}
			else
			{
				return "Error_Database";
			}
		}
			
	}
	

?>	