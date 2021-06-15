<?php

class CustomerLoader
{
    public function getCustomers()
    {
        $connection = new Dbconnection();
        $pdo = $connection->openConnection();

        $handle = $pdo->prepare('SELECT id, firstname, lastname, group_id, fixed_discount, variable_discount FROM customer');
        $handle->execute();
        $products = $handle->fetchAll();

        $customerArr = [];
        foreach ($customers as $customer) {
            $customer = new Customer($customer['id'],$customer['name'],$customer['price']);
            array_push($customerArr, $customer );
        }
        return $customerArr;
    }
}

?>