<?php

class CustomerLoader
{
    private array $customerArr=[];

    public function __construct() {
        $connection = new Dbconnection();
        $pdo = $connection->openConnection();

        $handle = $pdo->prepare('SELECT id, firstname, lastname, group_id, fixed_discount, variable_discount FROM customer');
        $handle->execute();
        $customers = $handle->fetchAll();

        foreach ($customers as $customer) {
            array_push($this->customerArr, new Customer((int) $customer['id'], (string) $customer['firstname'], (string) $customer['lastname'], (int) $customer['group_id'], (int) $customer['fixed_discount'], (int) $customer['variable_discount']));
        
        }
    
    }
    public function getCustomers():array
    {   
        return $this->customerArr;
    }

    //This method gets the selected id from the customer chosen as argument when called
    public function getCustomerById(int $id){

        foreach($this->customerArr as $customer) {
            if($id == $customer->getId()){
                return $customer;
            } 
            
        }
    }

}

?>