<html>
 <head>
   <title>Bugzilla System Monitor</title> 
   <style type="text/css" title="currentStyle">
        @import "DataTables/media/css/demo_table.css";
   </style>
   <script type="text/javascript" charset="utf-8" src="DataTables/media/js/jquery.js"></script>
   <script type="text/javascript" charset="utf-8" src="DataTables/media/js/jquery.dataTables.js"></script>
      <script type="text/javascript">
		$(document).ready( function () {
    		    $(function() {$("#TbFromDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});
	            $(function() {$("#TbToDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});
      
		} );
		
   </script>
   <script type='text/javascript'  src="ajax/jquery.ui.datepicker.js" ></script>
   <script type='text/javascript'  src="ajax/jquery.ui.core.js" ></script>
   <script type='text/javascript'  src="ajax/jquery.ui.widget.js" ></script>
   <script type='text/javascript'  src="ajax/ajax.js"></script>   
   <link   type="text/css"         rel="stylesheet"        href="css/jquery.ui.all.css" />
   <link   type="text/css"         rel="stylesheet"        href="css/demos.css" />
   <link   type="text/css"         href="css/common.css"   rel="stylesheet"/>      
 </head>
 <body>
   <form action="LogHistory.php" method="post" />
     <div id="Header">
		<div id="menuTitle">
			<font>Bugzilla System Monitor</font>
			<p id="DateNow"></p>
		</div>		
		<br/>   
		<div style="margin-left:20px ">
			<a  href="http://localhost/BugzillaMonitor">	
				<img id="Home"            class="imgHover"  src="images/Homefinal.png"/> 
			</a>
			<a  href="AuditTimer.php">	
				<img id="AuditTimer"      class="imgHover"  src="images/AuditFinal.png"/>
			</a>			
	        <a  href="TicketTimer.php">	
				<img id="TicketTimer"     class="imgHover"  src="images/Ticket13.png"/>
			</a>
			<a  href="ProfileTimer.php">	
				<img id="UserTimer"       class="imgHover"  src="images/Profilefinal.png"/>
			</a>
			<a  href="History.php">	
 		        <img id="AuditHistory"    class="imgHover"  src="images/History.png"/>
            </a> 
			<a href="Profile.php">
		        <img id="UserProfile"           class="imgHover"  src="images/UserProfile.png"   onclick="Users()" />
			</a>
		</div>
   </div>
   <span id="error">
	 <?php if(isset($_GET['err']))
	    {
	      $message= $_GET['err'];
          echo $message;  
	    } ?>
	</span>
   <div id="History"> Log History Details </div>
   <div id="Content">	  
	  <div id="FDate">
		<b> From Date *</b>
	        <input id="TbFromDate" type="text" name="TFromDate"/>
	  </div> 
	  <div id="TDate">
		<b> To Date  *</b>
            <input id="TbToDate" type="text" name="TToDate"/>
	  </div>
          <div id="module">
		 <b> Table Details *</b>
		 <select id="DatabaseTable" name="tableModules">
  			<option value=""></option>
  			<option value="Audit">Audit</option>
			<option value="Ticket">Ticket</option>
			<option value="Profile">Profile</option>
		 </select> 
	 </div>
	<div id="BtnSubmit"> 
		<input type="Submit" value="Submit" name="Submit" onclick="validCheck()"/>
		<input type="Button" Value="Cancel" name="Cancel" onclick="clearDetails()" /> 
	</div> 	
   </div>	  
</form>
</body>
</html>

