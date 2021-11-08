
    function validatePassword()
    {
    var p1 =  document.getElementById("password1").value;
    var p2 =  document.getElementById("password2").value;
    
        if(p1 == p2){
        document.getElementById("errorMatch").innerHTML="Paswords Match"; 
        document.getElementById("errorMatch").style.color='green'; 
        document.getElementById('createacc').disabled = false;
        
        }
        else if(p1=="" && p2==""){document.getElementById("errorMatch").innerHTML=""; }
        else{
        document.getElementById("errorMatch").innerHTML="Paswords Not Match"; 
        document.getElementById("errorMatch").style.color='red'; 
        document.getElementById('createacc').disabled = true;}
    }