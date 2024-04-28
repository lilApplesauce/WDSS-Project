<?php include("../Layout/Header2.php");

class CheckoutFail{
}
echo "Cannot Proceed to Checkout since product is sold out";
?>
<form method="post" action="Customer.php">
    <input type="submit" name="product" value="Return to Customer">
</form>
<br><br>
    <form method="post" action="../index.php">
        <input type="submit" name="product" value="Return to Homepage">
    </form>

<?php include("../Layout/Footer.php");