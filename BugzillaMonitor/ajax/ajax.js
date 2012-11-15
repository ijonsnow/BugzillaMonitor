var Audit = 0;
var Ticket = 0;
var Profile = 0;
var history;
//	Audit Timer log	
	function AuditLogTimer()
	{
	  clearTimeout(Ticket);
	  clearTimeout(Profile);
	  HideDateRangeTag();	
	  $("#AuditDetails").css("visibility", "visible");
	  var ajax_load = "<img src='images/load.gif' alt='loading...' />";
	  var loadurl="AuditTimer.php";
	  $("#AuditDetails").html(ajax_load);  
      $.get(  
            loadurl,  
            {language: "php", version: 5},  
            function(responseText){  
                $("#AuditDetails").html(responseText);  
            },  
            "html"  
        );  
	  Audit=setTimeout(function(){AuditLogMakeRequest()},1800000);
	}
		
//  Bug Timer Log function	
	function BugLogTimer()
	{	  
		clearTimeout(Audit);
	    clearTimeout(Profile);	  
		HideDateRangeTag();
		$("#AuditDetails").css("visibility", "visible");
	    var ajax_load = "<img src='images/load.gif' alt='loading...' />";
		var loadurl="TicketTimer.php";
		$("#AuditDetails").html(ajax_load);  
        $.get(  
            loadurl,  
            {language: "php", version: 5},  
            function(responseText){  
                $("#AuditDetails").html(responseText);  
            },  
            "html"  
        );  
		Ticket=setTimeout(function(){BugLogTimer()},1800000);
    }
	
	

//  Profile log timer function
	function ProfileLogTimer()
	{
	  clearTimeout(Audit);
	  clearTimeout(Ticket);	  
	  HideDateRangeTag();	
	  $("#AuditDetails").css("visibility", "visible");
	  var ajax_load = "<img src='images/load.gif' alt='loading...' />";
	  var loadurl="ProfileTimer.php";
	  $("#AuditDetails").html(ajax_load);  
      $.get(  
            loadurl,  
            {language: "php", version: 5},  
            function(responseText){  
                $("#AuditDetails").html(responseText);  
            },  
            "html"  
        );  
	  Profile=setTimeout(function(){ProfileLogTimer()},1800000);
	}	

	
//  User Profile details function
	function Users()
	{
	  clearTimeout(Audit);
	  clearTimeout(Ticket);
	  clearTimeout(Profile);
	  HideDateRangeTag();
	  $("#AuditDetails").css("visibility", "visible");
 	  var ajax_load = "<img src='images/load.gif' alt='loading...' />";
	  var loadurl="Profile.php";
	  $("#AuditDetails").html(ajax_load);  
      $.get(  
            loadurl,  
            {language: "php", version: 5},  
            function(responseText){  
                $("#AuditDetails").html(responseText);  
            },  
            "html"  
        );  		
	}
// 

	function TransferedRequester()	{
	 var from_date = $("#FromDate").val();
	 var to_date=$("#ToDate").val();
	 var ajax_load;
	 var loadurl;
	 if (!(from_date ==="") && !(to_date===""))
	 {
	 switch(history)
	  {
	    case "AuditHistory": HideDateRangeTag();	
						     $("#AuditDetails").css("visibility", "visible");
						     ajax_load = "<img src='images/load.gif' alt='loading...' />";
						     loadurl="AuditHistory.php";
						     $("#AuditDetails").html(ajax_load);  
						     $.post(  
						 	  loadurl,  
							  {language: "php", version: 5,frm_dte:from_date,to_dte:to_date},  
							  function(responseText){  
								 $("#AuditDetails").html(responseText);  
							  },  
							  "html"  
						     );
							 break;
	
	    case "TicketHistory": HideDateRangeTag();	
						      $("#AuditDetails").css("visibility", "visible");
						      ajax_load = "<img src='images/load.gif' alt='loading...' />";
						      loadurl="TicketHistory.php";
						      $("#AuditDetails").html(ajax_load);  
						      $.post(  
						 	  loadurl,  
							  {language: "php", version: 5,frm_dte:from_date,to_dte:to_date },  
							  function(responseText){  
								 $("#AuditDetails").html(responseText);  
							  },  
							  "html"  
						     ); 
							 break;
							 
		case "UserHistory":  HideDateRangeTag();	
						     $("#AuditDetails").css("visibility", "visible");
						     ajax_load = "<img src='images/load.gif' alt='loading...' />";
						     loadurl="ProfileHistory.php";
						     $("#AuditDetails").html(ajax_load);  
						     $.post(  
						 	  loadurl,  
							  {language: "php", version: 5,frm_dte:from_date,to_dte:to_date},  
							  function(responseText){  
								 $("#AuditDetails").html(responseText);  
							  },  
							  "html"  
						     ); 
							 break;		
		default: break;						
	  }
	 }
	 else
	 {
	   alert("* Dates are mandatory field");
	 }
  
	}
	
	
//  Show Audit DatePicker
	function ShowAuditDateRangeTag(element)
	{	  
	  history=element.id;	  
	  clearTimeout(Audit);
	  clearTimeout(Ticket);
	  clearTimeout(Profile); 	  
	  $("#AuditDateRange").css("visibility", "visible");
	  $(function() {$("#AuditFromDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});
	  $(function() {$("#AuditToDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});      
	}

//  Show Ticket DatePicker
	function ShowTicketDateRangeTag(element)
	{	  
	  history=element.id;	  
	  clearTimeout(Audit);
	  clearTimeout(Ticket);
	  clearTimeout(Profile); 	  
	  $("#TicketDateRange").css("visibility", "visible");
	  $(function() {$("#TicketFromDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});
	  $(function() {$("#TicketToDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});      
	}

//  Show User DatePicker
	function ShowUserDateRangeTag(element)
	{	  
	  history=element.id;	  
	  clearTimeout(Audit);
	  clearTimeout(Ticket);
	  clearTimeout(Profile); 	  
	  $("#UserDateRange").css("visibility", "visible");
	  $(function() {$("#UserFromDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});
	  $(function() {$("#UserToDate").datepicker({ dateFormat: 'yy-mm-dd' }).val();});      
	}	
	
//  Hide Audit DatePicker
	function HideAuditDateRangeTag()
	{
		$("#AuditDateRange").css("visibility", "hidden");
		$("#AuditFromDate").val(null); 
		$("#AuditToDate").val(null);				
	}

//  Hide Ticket DatePicker	
	function HideTicketDateRangeTag()
	{
		$("#TicketDateRange").css("visibility", "hidden");
		$("#TicketFromDate").val(null); 
		$("#TicketToDate").val(null);				
	}
		
//  Hide User DatePicker	
	function clearDetails()
	{
		$("#TbFromDate").val(null); 
		$("#TbToDate").val(null);				
		$("#DatabaseTable").val(null);
	}
	
	
