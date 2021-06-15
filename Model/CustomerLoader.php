<?php

class CustomerLoader
{
    public function getCustomers()
    {
        $connection = new Dbconnection();
        $pdo = $connection->openConnection();

        $handle = $pdo->prepare('SELECT id, firstname, lastname, group_id, fixed_discount, variable_discount FROM customer');
        $handle->execute();
        $customers = $handle->fetchAll();

        $customerArr = [];
        foreach ($customers as $customer) {
            $customer = new Customer((int) $customer['id'], (string) $customer['firstname'], (string) $customer['lastname'], (int) $customer['group_id'], (int) $customer['fixed_discount'], (int) $customer['variable_discount']);
            array_push($customerArr, $customer );
        }
        return $customerArr;
    }
}

?>