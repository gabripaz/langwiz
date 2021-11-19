$(document).ready(function() {		
	$('#photo').live('change', function()			{ 
		$("#preview").html('');
		$("#preview").html('<img src="img/loader.gif" alt="Uploading...."/>');
	$("#image_upload_form").ajaxForm({
				target: '#preview'
}).submit();

	});
}); 

function changeStatus(){
document.getElementById("postedstatus").innerHTML = document.getElementById("status").innerHTML;
}