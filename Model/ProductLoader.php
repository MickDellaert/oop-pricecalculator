<?php

  class ProductLoader
  {
    private array $productArr=[];

    public function __construct()
      {
          $connection = new Dbconnection();
          $pdo = $connection->openConnection();

          $handle = $pdo->prepare('SELECT id, name, price FROM product');
          $handle->execute();
          $products = $handle->fetchAll();

          foreach ($products as $product) {
              array_push($this->productArr, new Product($product['id'],$product['name'],$product['price'])) ;
          }
      }

      public function getProducts():array
      {
          return $this->productArr;
      }

      public function getProductById(int $id){

        foreach($this->productArr as $product) {
            if($id == $product->getId()){
                return $product;
            } 
            
        }
    }
  }
  
?>