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

    echo "<br> first name:";
    echo $customerSelect->getFirstname();
    echo "<br><br> id:";
    echo $customerSelect->getId();
    echo "<br><br> group id:";
    echo $customerSelect->getGroupId();
    echo "<br><br> product:";
    echo $productSelect->getName();
    echo "<br><br> customer variable discount:";
    echo $customerSelect->getVariableDiscount();
    echo "<br><br> customer fixed discount:";
    echo $customerSelect->getFixedDiscount();
    echo "<br><br> group variable discount:";
    echo $groupSelect->getVariableDiscount();
    echo "<br><br> group fixed discount:";
    echo $groupSelect->getFixedDiscount();

    echo "<br><br> group id test:";
    $test = $customerSelect->getGroupId() ;
        var_dump($groupSelect->getVariableDiscount());

    ?>

    <p><a href="index.php?page=info">To info page</a></p>

    <p>Put your content here.</p>
</section>

<?php require 'includes/footer.php'?>