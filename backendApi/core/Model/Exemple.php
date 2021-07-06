<?php

namespace Model;
use PDO;

class Exemple extends Model
{
    protected $table = "exemples";
    
    public $id;
    public $propriete1;
    public $propriete2;
    public $user_id;

    // public function getMakes(){
    //   $modelMake = new \Model\Make();

    //  $nombreMakes = $modelMake->findAllByGateau($this->id);

    //   return $nombreMakes;
    // }


    /**
     * crée un nouveau gateau
     * 
     * @param string $propriete1
     * @param string $propriete2
     * @return void
     */

    public function insert(string $propriete1, string $propriete2):void
    {

        $maRequete = $this->pdo->prepare("INSERT INTO exemples (propriete1, propriete2) 
        VALUES (:propriete1, :propriete2)");

          $maRequete->execute([
          'propriete1' => $propriete1,
          'propriete2' => $propriete2
       

          ]);



    }
    /**
     * 
     * modifie un gateau
     */
    public function update(string $propriete1, string $propriete2, int $id) : void
    {

        

        $maRequete = $this->pdo->prepare("UPDATE exemples 
        SET propriete1=:propriete1, propriete2 = :propriete2 
        WHERE id = :id");

          $maRequete->execute([
          'propriete1' => $propriete1,
          'propriete2' => $propriete2,
          'id' => $id
       

          ]);
    }

    public function findAuthor()
    {
      return  $this->find($this->user_id, \Model\User::class, "autreTable");
       
    }


}