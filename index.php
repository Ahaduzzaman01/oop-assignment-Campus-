<?php

class Payment {
    public $mobile_banking, $shopping_amount, $discount_percentage, $payment_method, $payable_amount, $conditional_amount, $payment_status;

    public function __construct(){
        $this->payment_method = 'Mobile Banking';
        $this->mobile_banking = 'Bkash';
        $this->payment_status = 'Paid';
        $this->shopping_amount = 9500;
        // $this->shopping_amount = 3100;
        $this->conditional_amount = 2000;
        $this->discount_percentage = 10;
    }

    public function index(){

        switch ($this->payment_status) {
            case 'Paid':
                $this->paymentCalculation();
        
                echo '<b>Payment status: ' . $this->payment_status . '</b><br>';
                echo '<b>Payment method: '. $this->payment_method .'</b><br>';
                echo '<b>Paid by: ' . $this->mobile_banking . '</b>';
                break;
            
            case 'Unpaid':
                echo '<b>Payment status: ' . $this->payment_status . '</b><br>';
                $this->paymentCalculation();
                break;
            
            case 'Pending':
                echo '<b>Payment status: ' . $this->payment_status . '</b><br>';
                $this->paymentCalculation();
                break;
        }
    }

    public function paymentCalculation(){
        if($this->shopping_amount > $this->conditional_amount){
            $this->discount_amount = $this->shopping_amount * $this->discount_percentage / 100;
            $this->payable_amount = $this->shopping_amount - $this->discount_amount;

            echo '<b>Shopping amount: </b>' . $this->shopping_amount . ' BDT<br>';
            echo '<b>Discount amount ('.$this->discount_percentage.'%): </b>'.$this->discount_amount.' BDT <br>';
            echo ($this->payment_status == 'Paid') ? '<b>Total amount: </b>' .$this->payable_amount. ' BDT <br>': '<b>Payable amount: </b>'.$this->payable_amount. ' BDT <br>';
        } else {
            echo '<b>Discount not available for '.$this->shopping_amount.' shopping amount. (Condition not applied)</b><br>';
            echo '<b>Shopping amount: </b>'. $this->shopping_amount. ' BDT <br>';
            echo ($this->payment_status == 'Paid') ? '<b>Total amount: </b>' .$this->shopping_amount. ' BDT <br>': '<b>Payable amount: </b>'.$this->shopping_amount. ' BDT <br>';
        }
    }
}


$payment = new Payment;
$payment->index();