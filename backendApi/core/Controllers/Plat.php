<?php

namespace Controllers;

class Plat extends Controller {
    protected $modelName = \Model\Plat::class;

    public function suppr()
    {
        $plat_id = null;

        if( !empty($_POST['platId']) && ctype_digit($_POST['platId']) ){

            $plat_id = $_POST['platId'];
            
        }

        if(!$plat_id){

            die("on ne supprime pas un plat  sans un id de recette valide");
        }

        $plat = $this->model->find($plat_id, $this->modelName);
        $restaurant_id = $plat->restaurant_id;


        $this->model->delete($plat_id);

        
        // \Http::redirect("index.php?controller=gateau&task=show&id=$restaurant_id");

    }

    public function supprApi()
    {
        $plat_id = null;

        if( !empty($_POST['platId']) && ctype_digit($_POST['platId']) ){

            $plat_id = $_POST['platId'];
            
        }

        if(!$plat_id){

            die("on ne supprime pas un plat sans un id de recette valide");
        }

        $plat = $this->model->find($plat_id, $this->modelName);
        $restaurant_id = $plat->restaurant_id;


        $this->model->delete($plat_id);

        header("Access-Control-Allow-Origin: *");  
           json_encode($plat);
        // \Http::redirect("index.php?controller=gateau&task=show&id=$restaurant_id");

    }
}