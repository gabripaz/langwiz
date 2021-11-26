 $(document).ready(function(){
	       $('.senduser').click(function(){

          $.ajax({
                url: 'phpFiles/LoginHandler.php',
                data: {userConnID: $(this).val()},
                success: function () {
                    alert("User Added")
                }
            });
       });
    });