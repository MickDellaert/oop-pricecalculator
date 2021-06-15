<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form action="" method="post">
        <select class="form-select" aria-label="Default select example">
            <?php foreach ($products AS $product) {
                echo '<option value="' . $product->getName() . '">' . '</option>';
            };?>
    </select>
    </form>



<!--    --><?php //echo $product->getID() ?>
<!--    --><?php //echo $product->getPrice() ?>

    <p><a href="index.php?page=info">To info page</a></p>

    <p>Put your content here.</p>
</section>

<?php require 'includes/footer.php' ?>