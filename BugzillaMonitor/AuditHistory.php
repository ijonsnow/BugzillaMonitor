<?php
include("DBconfig.php");
include("AuditClass.php");
$Afrom=$_GET['fdate'];
$Ato=$_GET['tdate'];
//$Log=new AuditLog($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),"","");
//$Log=new AuditLog($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),'','');
$AuditHistory=new AuditLog($dbHost,$dbUser,$dbPwd,$dbName,'',$Afrom,$Ato);
$result=$AuditHistory->Display();
?>
<html>
 <head>
	<?php
		include("header.php");
	?>
    <script type="text/javascript">
	$(document).ready( function () {
	$('#AuditHistoryDetails').dataTable({
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
   <div class="positionDownload"><a href="AuditHistoryDownload.php?Afdate=<?php echo$Afrom; ?>&Atdate=<?php echo $Ato;?>">Download<a/></div><br/>
   <div class="TableTitle TableDetails">Audit Log History Details</div><hr/>
   <table id="AuditHistoryDetails" class="display">
		<thead>
	 	 <tr>
			<th>User</th>
			<th>Class</th>
			<th>ObjectId</th>
			<th>Field</th>
			<th>Removed</th>
			<th>Added</th>
			<th>DateTime</th>
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
			<td><?php  echo $data[3] ?></td>
			<td><?php  echo $data[4] ?></td>
			<td><?php  echo $data[5] ?></td>
			<td><?php  echo $data[6] ?></td>
		</tr>
		<?php } ?>
		</tbody>		
	
	</div>
 </body>
</html>




