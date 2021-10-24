<?php 
require_once 'configurationdb.php';



function getValues()
{
    $userAcc = array(
        "UserName"=>$_GET["userName"],
        "FName"=>$_GET["firstName"],
        "LName"=>$_GET["LastName"],
        "LocationID"=>1000,
        "EmailAddress"=>$_GET["email"],
        "Photo"=>"img/default.jpg"
        
    );
        
    return $userAcc;
    
}

function getSqlFieldsInsert($v){
    $acInfo=getValues();
    $sqlStmt1="";
    $sqlStmt2="";
    foreach($acInfo as $key=>$value){
        if(isset($value))
        {
            $sqlStmt1 = $sqlStmt1."`{$key}`,";
            
        }
    }
    $sqlStmt1 = substr_replace($sqlStmt1, "", -1);
    
    foreach($acInfo as $key=>$value){
        if(isset($value))
        {
            if($key == "LocationID")
                $sqlStmt2 = $sqlStmt2."'$v',";
                else
                    $sqlStmt2 =$sqlStmt2."'$value',";
        }
    }
    $sqlStmt2 = substr_replace($sqlStmt2, "", -1);
    
    
    
    return "INSERT INTO `users`($sqlStmt1) VALUES ($sqlStmt2)";
    
}   

//##########################################################################################################
if(isset($_GET['CreateAcc']))
{

   
    $locName=$_GET["countryselect"];
    $sqlStm = "Select `LocationID` from `location` where `Country` ='$locName'";
  
    $queryid=mysqli_query($connection, $sqlStm);
    $getlocID=mysqli_fetch_array($queryid);
    $locID = $getlocID["LocationID"];
   
    $sqlSmt =getSqlFieldsInsert($locID);
    
    //echo "$sqlSmt";
    
    
    
    $queryid=mysqli_query($connection, $sqlSmt);
    
   
    //I AM HAVING PROBLEMS WITH THIS PART... I am not sure why does'nt want to recognise the variable of the sql statement it says Warning: Undefined variable $sqlSmt11 
    /*
    if(isset($_GET["userPassword"]))
    {
        $passw=$_GET["userPassword"];
   
   // $sqlStm11="INSERT INTO `passwords`(`Password`) VALUES (`$passw`)";
    $sqlStm11="INSERT INTO `passwords`(`Password`) VALUES (`patata`)";
    echo "pasww  $passw  $sqlSmt11";
    $queryid=mysqli_query($connection, $sqlStm11);}
    
    */
 
}

?>