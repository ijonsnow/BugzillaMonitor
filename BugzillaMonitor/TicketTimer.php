<?php
include("DBconfig.php");
include("TicketClass.php");
$TicketTimer=new TicketLog($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),"","");
$result=$TicketTimer->Display();
?>
<html>
 <head>
    <?php
		include("header.php");
	?>
   <script type="text/javascript">
	$(document).ready( function () {
	$('#TicketTimerDetails').dataTable({
		"iDisplayLength": 20,
		"iDisplayStart": 20
	});
//  alert("Ticket");  
    Ticket=setTimeout(function(){window.location.href=document.URL;},180000);					
	} );
    </script>
 </head>
 <body>
 <?php
    include("Menu.php");
 ?>
   <div class="positionDownload"><a href="TicketTimerDownload.php">Download<a/></div><br/>
   <div class="TableTitle TableDetails">Ticket Log Details</div><hr/>   
   <table id="TicketTimerDetails" class="display">
		<thead>
	 	 <tr>
			<th>BugId</th>
			<th>AttachId</th>
			<th>Who</th>
			<th>BugWhen</th>
			<th>FieldId</th>
			<th>Added</th>
			<th>Removed</th>
			<th>CommentId</th>
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
			<td><?php  echo $data[7] ?></td>
		</tr>
		<?php } ?>
		</tbody>			
	</div>
 </body>
</html>


