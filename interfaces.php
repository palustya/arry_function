<?php
// Interface definition
interface Payment {
    public function makePayment($amount);
    public function getPaymentStatus();
}
// Class implementing the interface
class CreditCardPayment implements Payment {
    public function makePayment($amount) {
        // Code to make payment using credit card
        echo "Payment of $amount via Credit Card is successful." . PHP_EOL;
    }
    public function getPaymentStatus() {
        // Code to check payment status
        echo "Payment status: Success" . PHP_EOL;
    }
}
// Class implementing the interface
class PayPalPayment implements Payment {
    public function makePayment($amount) {
        // Code to make payment using PayPal
        echo "Payment of $amount via PayPal is successful." . PHP_EOL;
    }
    public function getPaymentStatus() {
        // Code to check payment status
        echo "Payment status: Success" . PHP_EOL;
    }
}
// Usage
$creditCardPayment = new CreditCardPayment();
$creditCardPayment->makePayment(100);
$creditCardPayment->getPaymentStatus();
$paypalPayment = new PayPalPayment();
$paypalPayment->makePayment(50);
$paypalPayment->getPaymentStatus();
?>