<?php

  class ProductLoader
  {
      public function getProducts()
      {
          $connection = new Dbconnection();
          $pdo = $connection->openConnection();

          $handle = $pdo->prepare('SELECT id, name, price FROM product');
          $handle->execute();
          $products = $handle->fetchAll();

          $productArr = [];
          foreach ($products as $product) {
              $product = new Product($product['id'],$product['name'],$product['price']);
              array_push($productArr, $product );
          }
          return $productArr;
      }
  }
  
?>