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
            
        $customerSelect = ($customerLoader->getCustomerById(intval($_POST['customerSelect']))) ;

        $productSelect = ($productLoader->getProductById(intval($_POST['productSelect']))) ;

        $groupSelect = ($customerGroupLoader->getCustomerGroupById($customerSelect->getGroupId())) ;


        }   

       
        $customerGroups = $customerGroupLoader->getCustomerGroup();
        $groupFixed = $customerGroupLoader->getGroupFixedDiscount();

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}