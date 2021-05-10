<?php

class Connection
{

  private static $pdo;

  /** 
   * Function to connect in Database
   * @return PDO $pdo 
   */
  public static function connect()
  {
    if (self::$pdo == null) {
      try {
        self::$pdo = new PDO('mysql:host=localhost;dbname=testetezus', 'root', '1z2x3c4v7777');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e) {
        echo ('<p class="text-danger">ERRO AO CONECTAR NO BANCO DE DADOS PRESSIONE F5</p>');
      }
    }

    return self::$pdo;
  }
}
