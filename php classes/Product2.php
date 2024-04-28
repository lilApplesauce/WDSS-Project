<?php include("../Layout/Header2.php");

class Product2{
    public $ProductID;
    public $ProductQuantity;
    public $ProductPrice;


    public function __construct($ProductID, $ProductQuantity, $ProductPrice)
    {
        $this->ProductID = $ProductID;
        $this->ProductQuantity = $ProductQuantity;
        $this->ProductPrice = $ProductPrice;
    }

    public function getProductID()
    {
        return $this->ProductID;
    }

    public function setProductID($ProductID)
    {
        $this->ProductID = $ProductID;
    }

    public function getProductQuantity()
    {
        return $this->ProductQuantity;
    }

    public function setProductQuantity($ProductQuantity)
    {
        $this->ProductQuantity = $ProductQuantity;
    }

    public function getProductPrice()
    {
        return $this->ProductPrice;
    }

    public function setProductPrice($ProductPrice)
    {
        $this->ProductPrice = $ProductPrice;
    }
}

//Setting variables for each function. UserID is int, rest are strings, The Customer contains all the information of user
$ProductID = 1;
$ProductQuantity = "0";
$ProductPrice = "$59.99";
$Product = new Product2($ProductID, $ProductQuantity, $ProductPrice);

//Prints out the previously entered details of customer
echo 'There are currently ' . $Product->getProductQuantity() . ' copies in stock' . "<br>";
echo 'Game Price = ' . $Product->getProductPrice() . "<br>";
?>
<form method="post" action="CheckoutFail.php">
    <input type="submit" name="product" value="Checkout">
</form>
    <br><br>
    <form method="post" action="../index.php">
        <input type="submit" name="product" value="Return to Homepage">
    </form>

<?php include("../Layout/Footer.php");