<?php

namespace Controllers;


class Restaurant extends Controller {
    
    protected $modelName = \Model\Restaurant::class;

/**
 * 
 * Affiche la liste des restaurants
 * 
 * 
 */
    public function index() {

        $restaurants = $this->model->findAll($this->modelName);


        $titreDeLaPage = "Les restaurants";

        // \Rendering::render('home/restaurants', compact('restaurants','titreDeLaPage'));
    }

    public function indexApi() {

        $restaurants = $this->model->findAll($this->modelName);

        header("Access-Control-Allow-Origin: *");
        echo json_encode($restaurants);
    }


    public function show(){

        $restaurant_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $restaurant_id = $_GET['id'];
        }

        $restaurant = $this->model->find($restaurant_id, $this->modelName);

        $titreDeLaPage = $restaurant->name;

        $modelPlat = new \Model\Plat();
            $plats = $modelPlat->findAllByRestaurant($restaurant_id, \Model\Plat::class);


        }

    public function showApi(){
        $restaurant_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $restaurant_id = $_GET['id'];
        }

        $restaurant = $this->model->find($restaurant_id, $this->modelName);

        $titreDeLaPage = $restaurant->name;

        $modelPlat = new \Model\Plat();
            $plats = $modelPlat->findAllByRestaurant($restaurant_id, \Model\Plat::class);

        header("Access-Control-Allow-Origin: *");
            echo json_encode([
                'restaurant' => $restaurant,
                'plats' => $plats
            ]);

    }

}