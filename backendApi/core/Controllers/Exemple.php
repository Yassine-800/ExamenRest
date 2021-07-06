<?php

namespace Controllers;
use PDO;

class Exemple extends Controller
{

    protected $modelName = \Model\Exemple::class;
    
//si user vide echo deconnecté

    /**
     * 
     * affiche la liste des gateaux
     */
    public function index()
    
    {
            // $modelUser = new \Model\User();
            // $user = $modelUser->getUser(); 
            // $donneesExemple = $this->model->findAll($this->modelName);
            

            // $titreDeLaPage = "Le titre de la page";

            // \Rendering::render('exemples/exemple', compact('user', 'donneesExemple','titreDeLaPage'));
    }
    /**
     * 
     * 
     */
    public function indexApi() {

    //         $modelUser = new \Model\User();
    //         $user = $modelUser->getUser(); 

    //  $donneesExemple = $this->model->findAll($this->modelName);
        
     $donneesExemple = ["truc1" => "quelquechose", "truc2" => "autrechose"];

        header("Access-Control-Allow-Origin: *");  
        
            echo json_encode($donneesExemple);

    }

    /**
     * 
     * affiche un gateau
     * 
     */
    public function show()
    {
        //     $modelUser = new \Model\User();
        //     $user = $modelUser->getUser(); 
        //     $exemple_id= null;

        //     if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


        //         $exemple_id = $_GET['id'];
        //     }


        // $unObjetExemple = $this->model->find($exemple_id, $this->modelName);

        // $titreDeLaPage = $unObjetExemple->name;
        
        // $modelAutreExemple = new \Model\AutreExemple();
        //     $autresDonnees = $modelAutreExemple->findAllByGateau($exemple_id);
        
        // $modelMake = new \Model\Make();
        //   $makes = $modelMake->findAllByGateau($gateau_id, $this->modelName);

        \Rendering::render('exemples/exemple', compact( 'user', 'unObjetExemple', 'autresDonnees','titreDeLaPage'));

    }


    public function showApi() {

        // $modelUser = new \Model\User();
        //     $user = $modelUser->getUser(); 
        //     $exemple_id= null;

        //     if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


        //         $exemple_id = $_GET['id'];
        //     }


        // $exemple = $this->model->find($exemple_id, $this->modelName);
        
        // $modelAutreExemple = new \Model\AutreExemple();
        //     $autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id);
        
        // // $modelMake = new \Model\Make();
        // //   $makes = $modelMake->findAllByGateau($gateau_id, $this->modelName);

        //   header("Access-Control-Allow-Origin: *");
        //     echo json_encode([
        //         'exemple' => $exemple,
        //         'autresDonnees' => $autresDonnees
        //     ]);
    }

    /**
     * 
     * supprimer un gateau
     */
    public function suppr()
    {
        // $exemple_id = null;

        // if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


        //     $exemple_id = $_GET['id'];
        // }

        // if(!$exemple_id){
        //     die("pas d'id d'exemple donné");
        // }


        // //verifier si l'exemple existe
        // $exemple = $this->model->find($exemple_id);

        // if(!$exemple){
        //     die("exemple inexistant");
        // }

        // $this->model->delete($exemple_id);

        // \Http::redirect("index.php");
    }
    
}