<?php
require_once('Connection.php');

class Products
{
  /** Return all products stored in DB */
  public static function listAllProducts()
  {
    $sql = Connection::connect()->prepare("SELECT * FROM products");
    $sql->execute();
    return $sql->fetchAll();
  }
}
