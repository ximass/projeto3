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
        self::$pdo = new PDO('mysql:host=localhost;dbname=projeto3', 'root');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $e) {
        echo ('<p class="text-danger">ERRO AO CONECTAR NO BANCO DE DADOS PRESSIONE F5</p>');
      }
    }

    return self::$pdo;
  }
}
