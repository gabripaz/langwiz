<?php 
class Account{
    
   // private $userId;
    private $userName;
    private $firstName;
    private $lastName;
    private $photo;
    private $country;
    private $city;
    private $email;
    private $password;
    private $language;
    
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

    public function locationIdFinder($connection) {
          
        $sqlStmt="Select `LocationID` from `location` where `City`=:city";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(":city", $this->getCity(),PDO::PARAM_STR);
        
        $result=$prepareQuery->fetchAll();
        
       
            
            return $result;
            
        
        
        
    }
    public function languageIdFinder($connection){
        $sqlStmt="Select `LangID` from `languages` where `LangName`=:lang";
        $prepareQuery= $connection ->prepare($sqlStmt);
        $prepareQuery->bindValue(":lang", $this->getLanguage(),PDO::PARAM_STR);
        
        $result=$prepareQuery->fetchAll();
        
        
        
        return $result;
    }
    
    public function createAccount($connection) {
      // $userId=$this->userId;
       $userName=$this->userName;
       $firstName=$this->firstName;
       $lastName=$this->lastName;
       $photo=$this->photo;
      //$locationID=locationIdFinder();
       $email=$this->email;
       $password=$this->password;
       $languageID=languageIdFinder();
       
        
        $sqlStmt="INSERT INTO `users`(`Username`, `FName`,`LName`, `Photo`, `LocationID`, `EmailAddress`) 
        VALUES ('$userName','$firstName','$lastName','$photo',$locationID,'$email')";
        $result=$connection->exec($sqlStmt);
        
        /*$sqlStmt="INSERT INTO `accounts`(`UserID`, `Password`) VALUES ($userId,'$password')";
        $result1=$connection->exec($sqlStmt);
        
        $sqlStmt="INSERT INTO `languagespeak` (`LangID`, `UserID`) VALUES ($languageID,$userId)";
        $result2=$connection->exec($sqlStmt);*/
        
        //return $result+$result1+$result2;
        return $result;
    }
    
    
    
}


?>