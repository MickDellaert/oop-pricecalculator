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

         $customerVariable = $this->customer->getVariableDiscount();
         $groupVariable = $this->customerGroupLoader->getGroupVariableDiscount();
         $bestVariable = 0;

         if($customerVariable > $groupVariable){
            $bestVariable = $customerVariable;
         } else $bestVariable = $groupVariable;
         //var_dump($bestVariable);

         $productPrice = $this->product->getPrice();
         //var_dump($productPrice);

         $productPrice1 = $productPrice/100-$bestFixed;
         //var_dump($productPrice1);

        $productPrice2 = ($productPrice-(($bestVariable/100)*$productPrice))/100;
         //var_dump($productPrice2/100);
             

         if($productPrice1 > $productPrice2){
            $productPrice = $productPrice2;
         } else $productPrice = $productPrice1;


         if ($productPrice1 <= 0 || $productPrice2 <= 0) {
            $productPrice = 0;
         }

         return $productPrice;

      
            //return final price
        }

    }
?>