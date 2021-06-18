<?php

class CustomerGroupLoader
{
    private array $customerGroupArr=[];
    private array $customerArr = [];
    private $fixedDisc = 0;
    private array $variableDisc = [];
    

    public function __construct() {
        $connection = new Dbconnection();
        $pdo = $connection->openConnection();

        $handle = $pdo->prepare('SELECT id, name, parent_id, fixed_discount, variable_discount FROM customer_group ');
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

    //This method gets the group id from the customer chosen by $customerSelect->getGroupId in HomepageController as argument to access the customer_group table
    public function getCustomerGroupById(int $id){

        foreach($this->customerGroupArr as $customerGroup) {

            if($id == $customerGroup->getId()){
                array_push($this->customerArr, $customerGroup);

                if ($customerGroup->getParentId()){
                    $this->getCustomerGroupById($customerGroup->getParentId());
                }
                return $this->customerArr;
               
            }

        }
    }
    
    public function getGroupFixedDiscount() {
        $this->fixedDisc = 0; //Reset the method when being called a second time when outputting to the view
        foreach($this->customerArr as $customerGroup) {
           $this->fixedDisc += $customerGroup->getFixedDiscount();
        }
        return $this->fixedDisc;
    }
    
    public function getGroupVariableDiscount() {
        foreach($this->customerArr as $customerGroup) {

            //Generating the array in a different way as using array_push
            $this->variableDisc[] = $customerGroup->getVariableDiscount();
        }
        return max($this->variableDisc);
    }
}

?>