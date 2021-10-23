<?php 

namespace App\Domain\Model;

use App\Infrastructure\Persistence\ConnectionCreator;
use PDO;

class Color extends ConnectionCreator
{
  public String $id;

  public String $name;

  public function getAllColors()
  {
    $stmt = $this->conn->query('SELECT * FROM color');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}