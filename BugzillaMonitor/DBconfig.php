<?php
  $dbHost="localhost";
  $dbUser="root";
  $dbPwd="";
  $dbName="bugzilla";
  
Class DbConnection
{
	Private $Host;
	Private $User;
	Private $Pwd;
	Private $Db;
	Public function __Construct($dbHost,$User,$Pwd,$Db)
	{
		$this->Host=$dbHost;
		$this->User=$User;
		$this->Pwd=$Pwd;	
		$this->Db=$Db;
						
	}
				  
	Public function ConnectToDb()
	{
	 // echo mysql_connect($this->Host,$this->User,$this->Pwd);
	    return mysql_connect($this->Host,$this->User,$this->Pwd);
	}
		  
	Public function SelectDb()
	{
		$result=$this->ConnectToDb();
		if($result >0)
		{
			return mysql_select_db($this->Db,$result);
		}
		else
		 {
			return 0;
		 }
	}
				
}				  
  
?>
