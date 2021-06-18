<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        
        $productLoader = new ProductLoader();
        $products = $productLoader->getProducts();

        $customerLoader = new CustomerLoader();
        $customers = $customerLoader->getCustomers();

        $customerGroupLoader = new CustomerGroupLoader();
          
        $customerLoader = new CustomerLoader();


        if(!empty($_POST['customerSelect']) && (!empty($_POST['productSelect'])))
        {

        $customerId = intval($_POST['customerSelect']);
        $customerSelect = ($customerLoader->getCustomerById($customerId)) ;

        $productId = intval($_POST['productSelect']);
        $productSelect = ($productLoader->getProductById($productId)) ;

        $groupSelect = ($customerGroupLoader->getCustomerGroupById($customerSelect->getGroupId())) ;

        $priceCalculator = new PriceCalculator($productSelect, $customerSelect, $customerGroupLoader);
        $fixedDiscountCompare = $priceCalculator->calculate();
        }

       
        $customerGroups = $customerGroupLoader->getCustomerGroup();
        $groupFixed = $customerGroupLoader->getGroupFixedDiscount();
        $groupVariable = $customerGroupLoader->getGroupVariableDiscount();


        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}