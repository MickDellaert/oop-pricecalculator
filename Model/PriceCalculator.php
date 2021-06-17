<?php
    declare(strict_types=1);
//product class
 
    class PriceCalculator
    {
        private Product $product;
        private Customer $customer;
        private CustomerGroupLoader $customerGroupLoader;

        public function __construct (Product $product, Customer $customer, CustomerGroupLoader $customerGroupLoader){
            $this->product=$product;
            $this->customer=$customer;
            $this->customerGroupLoader=$customerGroupLoader;
        }

        public function calculate(){

         $customerFixed = $this->customer->getFixedDiscount();
         $groupFixed = $this->customerGroupLoader->getGroupFixedDiscount();
         $bestFixed = 0;

         if($customerFixed > $groupFixed){
            $bestFixed = $customerFixed;
         } else $bestFixed = $groupFixed;

         return $bestFixed;

            //return final price
        }

    }
?>