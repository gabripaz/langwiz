<?php 

class Account{
    
    private $userID;
    private $userName;
    private $firstName;
    private $lastName;
    private $photo;
    private $country;
    private $city;
    private $email;
    private $password;
    private $language;
    private $locId;
    private $langId;
    
    

    function __construct($userName=null, $firstName=null, $lastName=null,$photo=null,$country=null,$city=null,$email=null,$password=null, $language=null) {
        
       
        $this->userName=$userName;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->photo=$photo;
        $this->country=$country;
        $this->city=$city;
        $this->email=$email;
        $this->password=$password;
        $this->language=$language;
       
    }
    
    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->userID;
    }
    
    /**
     * @param string $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }
    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

   

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

 
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

 

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

 
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function searchUserId($connection){
        $sqlStmt="Select `UserID` from `users` where `Username`=:username";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':username', $this->getUserName(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        return $result[0]['UserID'];
        
    }
    public function createAccount($connection) {
      //search the location Id 
        $sqlStmt="Select `LocationID` from `location` where `City`=:city";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':city', $this->getCity(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        $locationID=($result[0]['LocationID']);
        //search the language Id 
        $sqlStmt="SELECT `LangID` FROM `languages` WHERE `LangName`=:lang";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':lang', $this->getLanguage(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        $languageID=($result[0]['LangID']);
        
      
       $userName=$this->userName;
       $firstName=$this->firstName;
       $lastName=$this->lastName;
       $photo=$this->photo;
       $email=$this->email;
       $password=$this->password;
       
        //Inserting Data into users
        $sqlStmt="INSERT INTO `users`(`Username`, `FName`,`LName`, `Photo`, `LocationID`, `EmailAddress`) 
        VALUES ('$userName','$firstName','$lastName','$photo',$locationID,'$email')";
        $result=$connection->exec($sqlStmt);
        //Searching the asigned user Id
        $sqlStmt="Select `UserID` from `users` where `Username`=:username";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':username', $this->getUserName(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        $userID=($result[0]['UserID']);
        //Inserting Data into accounts 
        $sqlStmt="INSERT INTO `accounts`(`UserID`, `Password`) VALUES ($userID,'$password')";
        $result1=$connection->exec($sqlStmt);
        //Inserting Data into languagespeak 
        $sqlStmt="INSERT INTO `languagespeak` (`LangID`, `UserID`) VALUES ($languageID,$userID)";
        $result2=$connection->exec($sqlStmt);
        
        return $result;
        
    }
    
    public function Login($connection){
        $userName=$this->userName;
        $password=$this->password;
        
        $sqlStmt="Select `UserID` from `users` where `Username`=:username";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':username', $this->getUserName(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        $userId= ($result[0]['UserID']);
        
      
        
        $sqlStmt="SELECT `Password` FROM `accounts` WHERE `UserID`=:userId";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':userId',$userId,PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        $passSaved=($result[0]['Password']);
        
        if( $password==$passSaved){
            return true;
        }
        else return false;
    }
    
    public function searchUserInformation($connection){
        $userName=$this->userName;
        $sqlStmt="SELECT u.`Username`,u.`UserID`,u.`FName`,u.`LName`,u.`Photo`,u.`EmailAddress`,l.LangName,lo.Country,lo.City, b.BadgeDesc 
        FROM users u
        LEFT JOIN location lo ON lo.LocationID = u.LocationID
        LEFT JOIN rewardtable r ON u.UserID=r.UserID
        LEFT JOIN languagespeak lgsp ON lgsp.UserID=u.UserID
        LEFT JOIN languages l ON lgsp.LangID=l.LangID
        LEFT JOIN badges b ON r.BadgeID=b.BadgeID 
        WHERE u.Username=:username";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':username', $this->getUserName(),PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
       
           return $result;
  
    }
    
    ///UPDATE
    function __call($method,$arg) {
        if ($method="update")
        {
            $userID=$this->userID;
           
            switch (count($arg)){
                case 1:
                    $userName=$this->userName;
                    $connection=$arg[0];
                    $sqlStmt="Update `users` set UserName='$userName' where UserID=$userID";
                    break;
                case 2:
                    $firstName=$this->firstName;
                    $connection=$arg[0];
                    $sqlStmt="Update `users` set FName='$firstName' where UserID=$userID";
                    break;
                
                case 3:
                    $photo=$this->photo;
                    $connection=$arg[0];
                    $sqlStmt="Update `users` set Photo='$photo' where UserID=$userID";
                    break;
                case 4:
                    $lastName=$this->lastName;
                    $connection=$arg[0];
                    $sqlStmt="Update `users` set LName='$lastName' where UserID=$userID";
                    break;
                case 5:
                    $email=$this->email;
                    $connection=$arg[0];
                    $sqlStmt="Update `users` set EmailAddress='$email' where UserID=$userID";
                    break;
               
            }
            $result = $connection->exec($sqlStmt);
            return $result;
        }
    }
   //SEARCH USERS
    public function searchUserSbyLanguage($connection){
       
        $sqlStmt="SELECT u.`Username`,u.`UserID`,u.`FName`,u.`LName`,u.`Photo`,u.`EmailAddress`,lo.Country,lo.City
        FROM users u
        LEFT JOIN location lo ON lo.LocationID = u.LocationID
        LEFT JOIN languagespeak lgsp ON lgsp.UserID=u.UserID
        LEFT JOIN languages l ON lgsp.LangID=l.LangID
        WHERE l.LangName=:language";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(':language', $this->language,PDO::PARAM_STR);
        $prepareQuery->execute();
        $result=$prepareQuery->fetchAll();
        
        
        return $result;
        
    }
    
    
}

?>