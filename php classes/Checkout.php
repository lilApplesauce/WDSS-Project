<?php include("../Layout/Header2.php");
require "Payment.php";

class Checkout{
    public $CheckoutID;
    public $CheckoutCard;
    public $CheckoutAddress;


    public function __construct($CheckoutID, $CheckoutCard, $CheckoutAddress)
    {
        $this->CheckoutID = $CheckoutID;
        $this->CheckoutCard = $CheckoutCard;
        $this->CheckoutAddress = $CheckoutAddress;
    }

    public function getCheckoutID()
    {
        return $this->CheckoutID;
    }

    public function setCheckoutID($CheckoutID)
    {
        $this->CheckoutID = $CheckoutID;
    }

    public function getCheckoutCard()
    {
        return $this->CheckoutCard;
    }

    public function setCheckoutCard($CheckoutCard)
    {
        $this->CheckoutCard = $CheckoutCard;
    }

    public function getCheckoutAddress()
    {
        return $this->CheckoutAddress;
    }

    public function setCheckoutAddress($CheckoutAddress)
    {
        $this->CheckoutAddress = $CheckoutAddress;
    }
}

//Setting variables for each function. UserID is int, rest are strings, The Customer contains all the information of user
$CheckoutID = 1;
$CheckoutCard = $Payment->getCardNumber();
$CheckoutAddress = "1 Test Lane, Dublin 1";
$Checkout = new Checkout($CheckoutID, $CheckoutCard, $CheckoutAddress);

//Prints out the previously entered details of customer
echo 'Card Number = ' . $Payment->getCardNumber() . "<br>";
echo 'Address Line = ' . $Checkout->getCheckoutAddress() . "<br>";
?>
<form method="post" action="OrderConfirmationClass.php">
    <input type="submit" name="product" value="Confirm Details">
</form>
    <br><br>
    <form method="post" action="../index.php">
        <input type="submit" name="product" value="Return to Homepage">
    </form>



<?php include("../Layout/Footer.php");
