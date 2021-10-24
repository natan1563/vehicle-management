<?php 

namespace App\Domain\Model;

use App\Infrastructure\Persistence\ConnectionCreator;
use DateTime;
use DateTimeImmutable;
use PDO;

class Vehicles extends ConnectionCreator
{

  public function getAllVehicles()
  {
    $stmt = $this->conn->query('SELECT a.*, b.name AS color_name FROM vehicles AS a INNER JOIN color AS b ON a.color_id = b.id ORDER BY a.id DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function vehicleRegistration(Array $vehicle)
  {
    $stmt = $this->conn->prepare("INSERT INTO vehicles(owner_name, color_id, model, plate, inserted_at) VALUES(?, ?, ?, ?, ?);");
    $stmt->bindValue(1, $vehicle['owner_name']);
    $stmt->bindValue(2, $vehicle['color_id']);
    $stmt->bindValue(3, $vehicle['model']);
    $stmt->bindValue(4, $vehicle['plate']);
    $stmt->bindValue(5, date('Y-m-d H:i:s'));
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