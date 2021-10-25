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
<<<<<<< HEAD
        "Photo"=>"img/default.jpg"
        
    );
        
    return $userAcc;
    
=======
        "Photo"=>"img/default.jpg"        
    );        
    return $userAcc;    
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
}

function getSqlFieldsInsert($v){
    $acInfo=getValues();
    $sqlStmt1="";
    $sqlStmt2="";
    foreach($acInfo as $key=>$value){
        if(isset($value))
        {
<<<<<<< HEAD
            $sqlStmt1 = $sqlStmt1."`{$key}`,";
            
=======
            $sqlStmt1 = $sqlStmt1."`{$key}`,";            
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
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
<<<<<<< HEAD
    $sqlStmt2 = substr_replace($sqlStmt2, "", -1);
    
    
    
    return "INSERT INTO `users`($sqlStmt1) VALUES ($sqlStmt2)";
    
=======
    $sqlStmt2 = substr_replace($sqlStmt2, "", -1); 
    
    return "INSERT INTO `users`($sqlStmt1) VALUES ($sqlStmt2)";
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
}   

//##########################################################################################################
if(isset($_GET['CreateAcc']))
{
<<<<<<< HEAD

   
=======
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
    $locName=$_GET["countryselect"];
    $sqlStm = "Select `LocationID` from `location` where `Country` ='$locName'";
  
    $queryid=mysqli_query($connection, $sqlStm);
    $getlocID=mysqli_fetch_array($queryid);
    $locID = $getlocID["LocationID"];
   
    $sqlSmt =getSqlFieldsInsert($locID);
    
    //echo "$sqlSmt";
    
<<<<<<< HEAD
    
    
=======
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
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
<<<<<<< HEAD
 
=======
>>>>>>> ad0e40cf73fb602b7fd348bd4ab72885bc499c48
}

?>