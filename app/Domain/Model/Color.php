<?php 

namespace App\Domain\Model;

use App\Infrastructure\Persistence\ConnectionCreator;

class Color extends ConnectionCreator
{
  protected String $id;

  protected String $name;

  public function getId() 
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getAllVehicles()
  {
    $stmt = $this->conn->query('SELECT * FROM color');
    $stmt->execute();
    return $stmt->fetchObject(self::class);
  }
}