<?php
//we neet to extend the class ProductLoader to Dbconnection class in order to be able to access the connect method we have in the dbconnection class

  class ProductLoader {
      public function getProducts()
      {
          $connection = new Dbconnection();
          $pdo = $connection->openConnection();

          $handle = $pdo->prepare("SELECT * FROM product");
          $handle->execute();
          $products = $handle->fetchAll();

          return $products;
          
      }
    }
  
?>