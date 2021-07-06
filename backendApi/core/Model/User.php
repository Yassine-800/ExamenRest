<?php
namespace Model;
use PDO;

class User extends Model{
    protected $table = "users";

    public $id;
    public $username;
    private $password;
    public $email;

    public function setPassword($password){
       $this->password = $password; 
    }

    public function findByUserName(User $newUser) {
        $requete = $this->pdo->prepare("SELECT * FROM users WHERE username =:username");

        $requete->execute(["username" => $newUser->username]);

        $user = $requete->fetchObject(\Model\User::class);

        return $user;
    }

    public function signIn(User $newUser ){

       $user =  $this->findByUserName($newUser);

        if($newUser && $newUser->password == $newUser->password){
            $_SESSION['user'] = [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email
            ];

            return true;

        }else {
            return false;
        }        
    }

    public function isLoggedIn(){
        if(!empty($_SESSION['user']['id']) && isset($_SESSION["user"]["id"])){
            return true;
        }else {
            return false;
        }        

    }

    public function getUser(){
        if($this->isLoggedIn()){
            $user = $this->find($_SESSION['user']['id'], \Model\User::class);
            return $user;
        }else{
            return false;
        }

    }

    public function signOut(){
        session_unset();
    }

    public function signUp(User $newUser ){
        $requete = $this->pdo->prepare("INSERT INTO users(username, password)
            VALUES(:username, :password) ");

        $requete->execute([
            'username' => $newUser->username,
            'password' => $newUser->password
        ]);    
    }
    
    

    public function isAuthor(object $gateauOuRecette){
        if($this->id == $gateauOuRecette->user_id){
            return true;
        }else{
            return false;
        }
    }

    // 
    public function hasMade(object $gateauOuRecette){
// parler a un nouvel objet make
        $modelMake = new \Model\Make();
        // passser un objet user et soit gateau ou recette 
       
            if($modelMake->findByUser($this, $gateauOuRecette)){
                return true;
            }else{
                return false;
            }
        }
    }
