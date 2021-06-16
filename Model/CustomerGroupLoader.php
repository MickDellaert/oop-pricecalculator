<?php

class CustomerGroupLoader
{
    // private int $customerSelect;
    private array $customerGroupArr=[];

    public function __construct() {
        $connection = new Dbconnection();
        $pdo = $connection->openConnection();

        $handle = $pdo->prepare('SELECT id, name, parent_id, fixed_discount, variable_discount FROM customer_group');
        $handle->execute();
        $customerGroups = $handle->fetchAll();

        foreach ($customerGroups as $customerGroup) {
            array_push($this->customerGroupArr, new CustomerGroup((int) $customerGroup['id'], (string) $customerGroup['name'], (int) $customerGroup['parent_id'], (int) $customerGroup['fixed_discount'], (int) $customerGroup['variable_discount']));

        }

    }
    public function getCustomerGroup():array
    {
        return $this->customerGroupArr;
    }

    public function getCustomerGroupById(int $id){

        foreach($this->customerGroupArr as $customerGroup) {
            if($id == $customerGroup->getId()){
                return $customerGroup;
            }

        }
    }
}

?>