<?php

namespace Controllers;

class User extends Controller {

    protected $modelName = \Model\User::class;

    public function login(){
        $modelUser = new \Model\User();
        if(!empty($_POST['password']) && !empty($_POST['username'])){
           $password  = htmlspecialchars($_POST['password']);
           $modelUser->username = htmlspecialchars($_POST['username']);

           $modelUser->setPassword($password);

            if($this->model->signIn($modelUser)){

                \Http::redirect('index.php');
            
        }else{
            die();
        }
    }else{
        $modelUser = new \Model\User();
        $user = $modelUser->getUser(); 

        $titreDeLaPage = "Connexion";
            \Rendering::render('user/login',
                        compact('user', 'titreDeLaPage'));
    }
} 

    public function logout(){
        $this->model->signOut();

       \Http::redirect('index.php'); 
    }

    public function register(){
        $newUser = new \Model\User();
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $newUser->username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $newUser->setPassword($password);
                $this->model->signUp($newUser);

                \Http::redirect('index.php');
        }else{
            $modelUser = new \Model\User();
            $user = $modelUser->getUser();

            $titreDeLaPage = 'Inscription';
                \Rendering::render('user/register',
                            compact('user', 'titreDeLaPage'));

        }
     
    }
}