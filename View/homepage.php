<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->
    <section>

        <form class="form-control" action="" method="post" name="InputForm">

            <label for="Customers"><b>Choose a Customer</b></label>
            <select class="form-select" name="customerSelect">
                <!-- Displays the customerers in the dropdown, accessed in the controller  $customers = $customerLoader->getCustomers(); -->
                <?php foreach ($customers as $customer) {
                    $firstname = $customer->getFirstname();
                    $lastname = $customer->getLastname();
                    $id = $customer->getId();
                    echo "<option value='{$id}'> {$firstname}  {$lastname} </option>";
                };
                ?>
            </select>

            <label for="Products"><b>Choose a Product:</b></label>
            <select class="form-select" name="productSelect">
                <!-- Displays the products accessed in the controller $products = $productLoader->getProducts(); -->
                <?php foreach ($products as $product) {
                    $name = $product->getName();
                    $id = $product->getId();
                    echo "<option value='{$id}'> {$name} </option>";
                };
                ?>
            </select>

            <button type="submit" class="btn btn-primary " name="submit">Submit</button>

        </form>

        <div class="container content">
            <?php

            if (!empty($_POST['customerSelect']) && (!empty($_POST['productSelect']))) {
                echo "<p><b>Customer name: </b>{$customerSelect->getFirstname()} {$customerSelect->getLastname()}</p>";
                echo "<p><b>Customer id: </b>{$customerSelect->getId()}</p>";
                echo "<p><b>Product: </b>{$productSelect->getName()}</p>";
                echo "<p><b>Customer discounts: </b> Fixed &#8364; {$customerSelect->getFixedDiscount()} & Variable {$customerSelect->getVariableDiscount()} &#37;</p>";
                echo "<p><b>Group discounts: </b>Fixed &#8364; {$customerGroupLoader->getGroupFixedDiscount()} & Variable {$customerGroupLoader->getGroupVariableDiscount()} &#37;</p>";
                echo "<p><b>Price: </b>&#8364; {$productSelectPrice}</p>";
                echo "<p><b>Discounted price: </b>&#8364; {$priceCalculator->calculate()}</p>";
            }
            ?>
        </div>
    </section>

<?php require 'includes/footer.php' ?>