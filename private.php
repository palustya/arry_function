<?php
class BankAccount {
    // Private properties
    private $accountNumber;
    private $balance;
    // Constructor to initialize private properties
    public function __construct($accountNumber, $initialBalance) {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }
   // Private method to display account information
    private function displayAccountInfo() {
        return "Account Number: " . $this->accountNumber . ", Balance: $" . $this->balance;
    }
    // Public method to access private method and display account info
    public function getAccountInfo() {
        return $this->displayAccountInfo();
    }
}
// Object creation
$myAccount = new BankAccount('123456789', 1000);
// Accessing public method to display private property
$accountInfo = $myAccount->getAccountInfo();
// Output display
echo $accountInfo;
?>