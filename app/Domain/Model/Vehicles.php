<?php 

namespace App\Domain\Model;

use App\Infrastructure\Persistence\ConnectionCreator;
use DateTimeImmutable;

class Vehicles extends ConnectionCreator
{
  protected String $id;

  protected String $owner_name;

  protected String $color_id;

  protected String $model;

  protected String $plate;

  protected String $insert_at;

  protected String $updated_at;

  public function getId() 
  {
    return $this->id;
  }

  public function getOwner() 
  {
    return $this->owner_name;
  }

  public function getColorId()
  {
    return $this->color_id;
  }

  public function getModel()
  {
    return $this->model;
  }

  public function getPlate()
  {
    return $this->plate;
  }

  public function getDateInserted()
  {
    return $this->insert_at;
  }

  public function getDateUpdated()
  {
    return $this->updated_at;
  }

  public function getAllVehicles()
  {
    $stmt = $this->conn->query('SELECT * FROM vehicles ORDER BY ASC LIMIT 100');
    $stmt->execute();
    return $stmt->fetchObject(self::class);
  }

  public function vehicleRegistration(Array $vehicle)
  {
    $stmt = $this->conn->prepare("INSERT INTO vehicles(owner_name, color_id, molde, plate, inserted_at) VALUES(?, ?, ?, ?, ?);");
    $stmt->bindValue(1, $vehicle['owner_name']);
    $stmt->bindValue(2, $vehicle['color_id']);
    $stmt->bindValue(3, $vehicle['molde']);
    $stmt->bindValue(4, $vehicle['plate']);
    $stmt->bindValue(5, new DateTimeImmutable());
    return $stmt->execute();
  }

  public function vehicleUpdate(Array $vehicle)
  {
    $stmt = $this->conn->prepare("UPDATE vehicles SET owner_name = ?, color_id = ?, molde = ?, plate = ?, updated_at = ? WHERE id = ?;");
    $stmt->bindValue(1, $vehicle['owner_name']);
    $stmt->bindValue(2, $vehicle['color_id']);
    $stmt->bindValue(3, $vehicle['molde']);
    $stmt->bindValue(4, $vehicle['plate']);
    $stmt->bindValue(5, new DateTimeImmutable());
    $stmt->bindValue(6, $vehicle['id']);
    return $stmt->execute();
  }

  public function vehicleRemove(Int $id)
  {
    $stmt = $this->conn->prepare("DELETE FROM vehicles WHERE id = ?;");
    $stmt->bindValue(1, $id);
    return $stmt->execute();
  }
}