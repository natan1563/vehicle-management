<?php 

namespace App\Infrastructure\Persistence;

use PDO;
use PDOException;

class ConnectionCreator 
{
  protected PDO $conn;

  public function __construct() {
    try {
        $connect = new PDO(
            'mysql:host=127.0.0.1;dbname=php_test',
            'root',
            'toor'
        );

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $this->conn = $connect;
    } catch (PDOException $except) {
        echo 'Erro ao se conectar ao banco de dados, tente novamente mais tarde';
    }
  }
}