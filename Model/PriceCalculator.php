<?php
    declare(strict_types=1);

    class PriceCalculator
    {
        private $customerSelect; 
        private $productSelect;
        private $customerGroup;
        private int $fixed_discount;
        private int $variable_discount;
    
        public function __construct($customerSelect, $productSelect, $customerGroup,int $fixed_discount, int $variable_discount)
        {
          
            $this->fixed_discount = $fixed_discount;
            $this->variable_discount = $variable_discount;
    
        }
    
    


    }
?>