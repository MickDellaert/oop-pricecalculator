<?php
//we neet to extend the class ProductLoader to Dbconnection class in order to be able to access the connect method we have in the dbconnection class

  class ProductLoader extends Dbconnection {
      public function getProducts()
      {
          $sql = "SELECT * FROM products";
          $stmt = $this->connect()->query($sql);
          while ($row = $stmt->fetch())
          {
              return $row['name'] . "\n";
          }

          }
          
      }
  
?>