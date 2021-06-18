<?php
declare(strict_types=1);

class PriceCalculator
{
    private Product $product; // we define the class properties, which in this case are of type Object
    private Customer $customer;
    private CustomerGroupLoader $customerGroupLoader;

    public function __construct(Product $product, Customer $customer, CustomerGroupLoader $customerGroupLoader)
    {
        $this->product = $product;
        $this->customer = $customer;
        $this->customerGroupLoader = $customerGroupLoader;
    }

    public function calculate()
    {

        $customerFixed = $this->customer->getFixedDiscount(); // we access the methods we defined in a diffrent class (customer) with this and double arrow this->customer-> (any available method)
        $groupFixed = $this->customerGroupLoader->getGroupFixedDiscount();
        $bestFixed = 0;

        //Compare the customer fixed discount with the total of the group fixed discounts
        if ($customerFixed > $groupFixed) {
            $bestFixed = $customerFixed;
        } else $bestFixed = $groupFixed;

        $customerVariable = $this->customer->getVariableDiscount();
        $groupVariable = $this->customerGroupLoader->getGroupVariableDiscount();
        $bestVariable = 0;

        //Compare the customer variable discount with the maximum of the group variable discounts
        if ($customerVariable > $groupVariable) {
            $bestVariable = $customerVariable;
        } else $bestVariable = $groupVariable;

        $productPrice = $this->product->getPrice();

        $productPrice1 = $productPrice / 100 - $bestFixed;

        $productPrice2 = ($productPrice - (($bestVariable / 100) * $productPrice)) / 100;

        //Compare which discount brings the most value to the customer
        if ($productPrice1 > $productPrice2) {
            $productPrice = $productPrice2;
        } else $productPrice = $productPrice1;

        //If the discount is bigger than the price set price to zero because price can't be negative
        if ($productPrice1 <= 0 || $productPrice2 <= 0) {
            $productPrice = 0;
        }

        return round($productPrice, 2);

    }

}

?>