<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

<form action="" method="post">
  <label for="Customers">Choose a Customer</label>
  
  <select>
    <?php foreach ($customers AS $customer) {
        $firstname = $customer->getFirstname();
        $lastname = $customer->getLastname();
        $id = $customer->getId();
        echo "<option value='{$id}'> {$firstname}  {$lastname} </option>";
    };
    ?>
  </select>

<form action="" method="post">
  <label for="Products">Choose a Product:</label>
  
  <select>
    <?php foreach ($products AS $product) {
        $name = $product->getName();
        $id = $product->getId();
        echo "<option value='{$id}'> {$name} </option>";
    };
    ?>
  </select>



<!--    --><?php //echo $product->getID() ?>
<!--    --><?php //echo $product->getPrice() ?>

    <p><a href="index.php?page=info">To info page</a></p>

    <p>Put your content here.</p>
</section>

<?php require 'includes/footer.php'?>