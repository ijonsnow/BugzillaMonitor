<?php
include("DBconfig.php");
$Profile=new Profile($dbHost,$dbUser,$dbPwd,$dbName,"","","");
$result=$Profile->Display();
?>
<html>
 <head>
   <?php
       include("header.php");
   ?>
    <script type="text/javascript">
		$(document).ready( function () {
    		$('#ProfileDetails').dataTable({
				"iDisplayLength": 20,
				"iDisplayStart": 20
			});			
		} );
   </script>  
 </head>
 <body>
	<?php
		include("Menu.php");
	?>
   <div class="positionDownload"><a href="AuditTimerDownload.php">Download<a/></div><br/>
   <div class="TableTitle TableDetails">Profile Details</div>   
   <table id="ProfileDetails" class="display">
		<thead>
	 	 <tr>
			<th>User Id</th>
			<th>Login Name</th>
			<th>Real Name</th>
		 </tr>	
		</thead>
		<tbody>
		<?php
			while($data = mysql_fetch_row($result))
		{ ?>
        <tr>
			<td><?php  echo $data[0] ?></td>
			<td><?php  echo $data[1] ?></td>
			<td><?php  echo $data[2] ?></td>
		</tr>
		<?php } ?>
		</tbody>		
	
	</div>
 </body>
</html>
<?php
	class Profile
	{
	 private $DB;
	 public function __Construct($dbHost,$dbUser,$dbPwd,$dbName)
	 {
		$Db=new DbConnection($dbHost,$dbUser,$dbPwd,$dbName);
		$this->DB=$Db->SelectDb();  						
		
	 }
	 private function Profile()
	 {
		return mysql_query("SELECT userid,login_name,realname FROM `profiles`");
	 }
		
	 public function Display()
	 {
	  if($this->DB>0)	
	   {
		 	 $result=$this->Profile();				
			 return $result;
		  
	   }
	   else
	   {
			return "Error_Database";
	   }
	 } 	
	
	}


?>
