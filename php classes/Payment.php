<?php

class Payment{
    public $PaymentID;
    public $CardNumber;
    public $CardVerify;

    public function __construct($PaymentID, $CardNumber, $CardVerify)
    {
        $this->PaymentID = $PaymentID;
        $this->CardNumber = $CardNumber;
        $this->CardVerify = $CardVerify;
    }

    public function getPaymentID()
    {
        return $this->PaymentID;
    }

    public function setPaymentID($PaymentID)
    {
        $this->PaymentID = $PaymentID;
    }

    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    public function setCardNumber($CardNumber)
    {
        $this->CardNumber = $CardNumber;
    }

    public function getCardVerify()
    {
        return $this->CardVerify;
    }

    public function setCardVerify($CardVerify)
    {
        $this->CardVerify = $CardVerify;
    }
}
//Setting variables for each function. UserID is int, rest are strings, The Customer contains all the information of user
$PaymentID = 1;
$CardNumber = "1234 1234 1234 1234";
$CardVerify = "Verified";
$Payment = new Payment($PaymentID, $CardNumber, $CardVerify);
