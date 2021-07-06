<?php
namespace Model;
use PDO;
class Plat extends Model {

    protected $table = "plats";
    public $id;
    public $name;
    public $price;
    public $restaurant_id;

    public function findAllByRestaurant(int $restaurant_id, string $className){
        $sql = $this->pdo->prepare("SELECT * FROM plats WHERE restaurant_id = :restaurant_id");
        $sql->execute(["restaurant_id" => $restaurant_id]);

        $plats = $sql->fetchAll(PDO::FETCH_CLASS, $className);

        return $plats;
    }
}