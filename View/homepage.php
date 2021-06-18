<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

<form action="" method="post" name="InputForm">
  <label for="Customers">Choose a Customer</label>
  
  <select name="customerSelect">
    <?php foreach ($customers AS $customer) {
        $firstname = $customer->getFirstname();
        $lastname = $customer->getLastname();
        $id = $customer->getId();
        echo "<option value='{$id}'> {$firstname}  {$lastname} </option>";
    };
    ?>
  </select>

  <label for="Products">Choose a Product:</label>
  
  <select name="productSelect">
    <?php foreach ($products AS $product) {
        $name = $product->getName();
        $id = $product->getId();
        echo "<option value='{$id}'> {$name} </option>";
    };
    ?>
  </select>

    <input type="submit" name="submit" value="Choose options">

  </form>

    <?php


if(!empty($_POST['customerSelect']) && (!empty($_POST['productSelect'])))
{
    echo "<h3>Customer name: {$customerSelect->getFirstname()} {$customerSelect->getLastname()}</h3>";
    echo "<h3>Id: {$customerSelect->getId()}</h3>";
    echo "<h3>Product: {$productSelect->getName()}</h3>";
    echo "<h3>Customer discounts: Fixed &#8364; {$customerSelect->getFixedDiscount()} & Variable {$customerSelect->getVariableDiscount()} &#37;</h3>";
    echo "<h3>Group discounts: Fixed &#8364; {$groupFixed} & Variable {$groupVariable} &#37;</h3>";
   

    echo "<h3>The discounted price is: &#8364; {$fixedDiscountCompare}</h3>";

  }


    //    echo "<br><br> group variable discount:";
//    echo $groupSelect->getVariableDiscount();
//    echo "<br><br> group fixed discount:";
//    echo $groupSelect->getFixedDiscount();

//    var_dump($customerGroups);

//    echo "<br><br> group id test:";
//    echo $testgroup = $customerSelect->getGroupId() ;
//       var_dump($testgroup->getvariableDiscount);

    ?>

    <p><a href="index.php?page=info">To info page</a></p>

    <p>Put your content here.</p>
</section>

<?php require 'includes/footer.php'?>