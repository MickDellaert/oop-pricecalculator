<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        
        $productLoader = new ProductLoader(); // we create a new object and then we access the methods we defined in the class 
        $products = $productLoader->getProducts(); //it accesses all the products which will in the homepage view be displayed 
        $customerLoader = new CustomerLoader();
        $customers = $customerLoader->getCustomers();

        $customerGroupLoader = new CustomerGroupLoader();
          
        $customerLoader = new CustomerLoader();


        if(!empty($_POST['customerSelect']) && (!empty($_POST['productSelect']))) //verifies if the selection of the customer is not empty and access all the required methods
        {

            $customerId = intval($_POST['customerSelect']); // intval returns the int value 
            $customerSelect = ($customerLoader->getCustomerById($customerId)) ; // we access the method getCustomerById for the selected user $_POST['customerSelect']
           
            $customerFixed = $customerSelect->getFixedDiscount();
            $customerVariable = $customerSelect->getVariableDiscount();

            $productId = intval($_POST['productSelect']);
            $productSelect = $productLoader->getProductById($productId);
            $productSelectPrice = ($productSelect->getPrice())/100;

            $groupSelect = ($customerGroupLoader->getCustomerGroupById($customerSelect->getGroupId())) ;

            $priceCalculator = new PriceCalculator($productSelect, $customerSelect, $customerGroupLoader); // we provide the required arguments (objects) in order to create the new object

            $customerGroups = $customerGroupLoader->getCustomerGroup();
        }

       
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}