<?php
    declare(strict_types=1);
//product class
 
    class PriceCalculator
    {
        private Product $product;
        private Customer $customer;

        public function __construct (Product $product, Customer $customer){
            $this->product=$product;
            $this->customer=$customer;

        }

        public function calculate(){

         $this->customer->

            //return final price
        }

    }
?>