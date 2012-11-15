<?php
include("DBconfig.php");
include("ProfileClass.php");
$ProfileTimer=new ProfileActivity($dbHost,$dbUser,$dbPwd,$dbName,date('Y-m-d'),"","");
$result=$ProfileTimer->Display();
?>
<html>
 <head>
    <?php 
	    include("header.php");
	?>
   <script type="text/javascript">
        $(document).ready( function () {
    	$('#ProfileTimerDetails').dataTable({
				"iDisplayLength": 20,
				"iDisplayStart": 20
		});		
//      alert("Profile");  
        Profile=setTimeout(function(){window.location.href=document.URL;},180000);		
		} );	
      </script>
 </head>
 <body>
	<?php
	   include("Menu.php");
	?>	
   <div class="positionDownload"><a href="ProfileTimerDownload.php">Download<a/></div><br/>
   <div class="TableTitle TableDetails">Profile Log Details</div><hr/> 
   <table id="ProfileTimerDetails" class="display">
		<thead>
	 	 <tr>
			<th>UserId</th>
			<th>Who</th>
			<th>ProfileWhen</th>
			<th>FieldId</th>
			<th>OldValue</th>
			<th>NewValue</th>
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
		</tr>
		<?php } ?>
		</tbody>		
	
	</div>
 </body>
</html>

