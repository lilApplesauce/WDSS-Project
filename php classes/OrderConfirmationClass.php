<?php include("../Layout/Header2.php");

class OrderConfirmationClass{
    public $ConfirmID;

    public function __construct($ConfirmID)
    {
        $this->ConfirmID = $ConfirmID;
    }


    public function getConfirmID()
    {
        return $this->ConfirmID;
    }

    public function setConfirmID($ConfirmID)
    {
        $this->ConfirmID = $ConfirmID;
    }
}

echo "Order is Confirmed";
?>
    <form method="post" action="Customer.php">
        <input type="submit" name="product" value="Return">
    </form>
    <br><br>
    <form method="post" action="../index.php">
        <input type="submit" name="product" value="Return to Homepage">
    </form>


<?php include("../Layout/Footer.php");