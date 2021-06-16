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
        echo "<option value='{$firstname} {$lastname}'> {$firstname}  {$lastname} </option>";
    };
    ?>
  </select>

  <label for="Products">Choose a Product:</label>
  
  <select name="productSelect">
    <?php foreach ($products AS $product) {
        $name = $product->getName();
        $id = $product->getId();
        echo "<option value='{$name}'> {$name} </option>";
    };
    ?>
  </select>

    <input type="submit" name="submit" value="Choose options">

  </form>


    <?php

        if(!empty($_POST['customerSelect'])) {
            $selected1 = $_POST['customerSelect'];
            echo '<br>' . 'You have chosen: ' . $selected1 . '<br>';
        } else {
            echo 'Please select the value.';
        }
        if(!empty($_POST['productSelect'])) {
            $selected2 = $_POST['productSelect'];
            echo 'You have chosen: ' . $selected2;
        } else {
            echo 'Please select the value.';
        }

    ?>

    <p><a href="index.php?page=info">To info page</a></p>

    <p>Put your content here.</p>
</section>

<?php require 'includes/footer.php'?>