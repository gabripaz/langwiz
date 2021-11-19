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
          
        }
    }
    else{
        
        echo '<script>alert("Invalid Credentials!!")</script>';
    }
   
}


//LOGOUT
if(isset($_GET['logOut'])){
    session_destroy();
    header("location:index.php");
}

//UPDATE PROFILE
if(isset($_GET['editProfile'])){
    
    if(isset($_GET["userNameEdit"])){$userNameEdited=$_GET["userNameEdit"];}
    if(isset($_GET["firstNameEdit"])){$firstNameEdited=$_GET["firstNameEdit"];}
    if(isset($_GET["LastNameEdit"])){$lastNameEdited=$_GET["LastNameEdit"];}
    if(isset($_GET["emailEdit"])){$emailEdited=$_GET["emailEdit"];}
    
    
    $userID= $_SESSION["userid"];
    $ac1 =new Account();
    $ac1->setUserID($userID);
        
    if($userNameEdited!=""){
        $ac1 -> setUserName( $userNameEdited);
        $result=$ac1->update($connection);
        if($result==true)
        {
            echo  "The username has been updated";
        }
        else{
            $err=$connection->errorInfo();
            echo $err[2]."<br/>";
        }
    }
    
    if($firstNameEdited!=""){
        $ac1->setFirstName($firstNameEdited);
        $result=$ac1->update($connection,"FN");
        if($result==true)
        {
            echo  "The first name has been updated";
        }
        else{
            $err=$connection->errorInfo();
            echo $err[2]."<br/>";
        }}
        
        
        
        if($lastNameEdited!=""){
            $ac1->setLastName($lastNameEdited);
            $result=$ac1->update($connection,"LN","LN","LN");
            if($result==true)
            {
                echo  "The last Name has been updated";
            }
            else{
                $err=$connection->errorInfo();
                echo $err[2]."<br/>";
            }
        }
                if( $emailEdited!=""){
            $ac1->setEmail($emailEdited);
            $result=$ac1->update($connection,"E","M","A","IL");
            if($result==true)
            {
                echo  "The email has been updated";
            }
            else{
                $err=$connection->errorInfo();
                echo $err[2]."<br/>";
               
            }
           
        }  
        header("location:userpage.php");
}


// Searching users
if(isset($_GET['languageSelect'])){
    
    $lang=$_GET['languageSelect'];
    $ac2 =new Account();
    $ac2->setLanguage($lang);
    $ac2->searchUserSbyLanguage($connection);
    
}

?>