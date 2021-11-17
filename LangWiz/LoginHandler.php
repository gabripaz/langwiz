<?php 
require_once 'configurationdb.php';
require 'Account.Class.php';

$connection = new PDO("mysql:host=$hostname; dbname=$dbname",$username, $password);


session_start();


if(isset($_GET["userName"])){$userName=$_GET["userName"];}
if(isset($_GET["userPassword"])){ $password=$_GET["userPassword"];}

if(isset($_GET['Login']))
{
    $ac =new Account();
    $ac->setUserName($userName);
    $ac->setPassword($password);
    if($ac->Login($connection)){
        header("Location:userpage.php");
        $result=$ac->searchUserInformation($connection);
        if(sizeof($result)>0){

            $_SESSION["userid"]=$result[0]["UserID"];
            $_SESSION["userName"]=$result[0]["Username"];
            $_SESSION["FName"]=$result[0]["FName"];
            $_SESSION["LName"]=$result[0]["LName"];
            $_SESSION["Photo"]=$result[0]["Photo"];
            $_SESSION["email"]=$result[0]["EmailAddress"];
            $_SESSION["lang"]=$result[0]["LangName"];
            $_SESSION["country"]=$result[0]["Country"];
            $_SESSION["city"]=$result[0]["City"];
            $_SESSION["badges"]=$result[0]["BadgeDesc"];
            //echo "$userID $userFname  $userLname $userPhoto $userLocId $userEmail";
        }
    }
    else{
        
        echo '<script>alert("Invalid Credentials!!")</script>';
    }
    
}

if(isset($_GET['logOut'])){
    session_destroy();
    header("location:index.php");
}


?>