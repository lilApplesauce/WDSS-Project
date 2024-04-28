<?php include("../Layout/Header2.php");

class Customer{
    public $UserID;
    public $UserName;
    public $UserPass;
    public $UserMail;

 //Constructor
    public function __construct($UserID, $UserName, $UserPass, $UserMail)
    {
        $this->UserID = $UserID;
        $this->UserName = $UserName;
        $this->UserPass = $UserPass;
        $this->UserMail = $UserMail;
    }

//Getters and Setters
    public function getUserID()
    {
        return $this->UserID;
    }


    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }


    public function getUserName()
    {
        return $this->UserName;
    }


    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }


    public function getUserPass()
    {
        return $this->UserPass;
    }


    public function setUserPass($UserPass)
    {
        $this->UserPass = $UserPass;
    }


    public function getUserMail()
    {
        return $this->UserMail;
    }


    public function setUserMail($UserMail)
    {
        $this->UserMail = $UserMail;
    }
}

//Setting variables for each function. UserID is int, rest are strings, The Customer contains all the information of user
$UserID = 1;
$UserName = "Test Name";
$UserPass = "TestPass";
$UserMail = "Test@email.com";
$Customer = new Customer($UserID, $UserName, $UserPass, $UserMail);

//Prints out the previously entered details of customer
echo 'UserName = ' . $Customer->getUserName() . "<br>";
echo 'UserPass = ' . $Customer->getUserPass() . "<br>";
echo 'UserMail = ' . $Customer->getUserMail() . "<br>";
?>
<form method="post" action="Product.php">
    <input type="submit" name="product" value="Product">
</form>
<form method="post" action="Product2.php">
    <input type="submit" name="product" value="Product 2">
</form>
    <br><br>
    <form method="post" action="../index.php">
        <input type="submit" name="product" value="Return to Homepage">
    </form>

<?php include("../Layout/Footer.php");