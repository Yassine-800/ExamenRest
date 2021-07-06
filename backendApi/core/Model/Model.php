<?php

namespace Model;

use PDO;
//require_once "core/database.php";

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct(){
         $this->pdo = \Database::getPdo();
    }



/**
 * trouver un garage par son id
 * renvoie un tableau contenant un garage, ou un booleen
 * si inexistant
 * 
 * @param integer $id
 * @return array|bool
 */
    public function find(int $id, string $className, ? string $nomDeTable = null)
    {
      $sql = "SELECT * FROM {$this->table} WHERE id =:id";

      if(!empty($nomDeTable)) {   
        
        $sql = "SELECT * FROM $nomDeTable WHERE id =:id";

      }              
        $maRequete = $this->pdo->prepare($sql);
        
        $maRequete->execute(['id' => $id]);
        
        $item = $maRequete->fetchObject($className);
        
        return $item;

      }
    


/**
 * retourne un tableau contenant tous les items de 
 * la table garages
 * 
 * @return array
 */
  public function findAll(string $className)
  {
        
          $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
          
          $items = $resultat->fetchAll(PDO::FETCH_CLASS, $className);

          return $items;

  }


/**
 * supprime un item via son ID
 * @param integer $id
 * @return void
 */
public function delete(int $id) :void
{
 

  $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);


} 

}