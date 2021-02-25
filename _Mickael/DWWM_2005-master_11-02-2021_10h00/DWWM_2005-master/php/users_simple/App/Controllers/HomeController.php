<?php

namespace Controllers;

use Controller;

class HomeController extends Controller
{
    

    public function index()
    {
        // création d'un jeu de données
        $data = [
            'name' => 'Mike',
            'id' => 2, 
        ];

        // on retourne la vue et les données
        // la méthode $this->view() se trouve dans la classe Controller 
        // Elle s'ocupe de compiler la vue et les données ensembles
        return $this->view('home', $data);
        
    }

}