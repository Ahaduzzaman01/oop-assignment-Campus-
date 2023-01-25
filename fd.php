<?php

class Payment {
    public $mobile_banking, $shopping_amount, $discount_percentage, $payment_method, $payable_amount, $conditional_amount, $payment_status;
    public function __construct(){
        $this->payment_method = 'Mobile Banking';
        $this->mobile_banking = 'Bkash';
        $this->payment_status = 'Paid';
        // $this->shopping_amount = 12000;
        $this->shopping_amount = 1200;
        $this->conditional_amount = 1500;
        $this->discount_percentage = 18;
    }

    public function index(){
        switch ($this->shopping_amount > $this->conditional_amount) {
            case true:
                $this->discount_amount = $this->shopping_amount * $this->discount_percentage / 100;
                $this->payable_amount = $this->shopping_amount - $this->discount_amount;
                
                echo '<b>Shopping amount: </b>' . $this->shopping_amount . ' BDT <br>';
                echo '<b>Discount amount ('.$this->discount_percentage.'%): </b>'.$this->discount_amount.' BDT <br>';
                echo '<b>Payable shopping amount: </b>' . $this->payable_amount . ' BDT <br>';
                break;
            
            case false:
                echo '<b>Discount not available for '.$this->shopping_amount.' shopping amount. (Condition not applied)</b><br>';
                echo '<b>Shopping amount: </b>'. $this->shopping_amount. ' BDT <br>';
                echo '<b>Payable amount: </b>' . $this->shopping_amount. ' BDT <br>';
                break;
        }

        echo '<b>Payment status: ' . $this->payment_status . '</b><br>';
        echo '<b>Payment method: '. $this->payment_method .'</b><br>';
        echo '<b>Paid by: ' . $this->mobile_banking . '</b>';
    }
}

$payment = new Payment;
$payment->index();