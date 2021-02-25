<?php 

namespace Controllers;

use Controller;
use Router;

class UsersController extends Controller
{

    public function index()
    {
        echo 'USERS INDEX';
    }

    public function about()
    {
        echo 'ABOUT ABOUT';

       // return $this->view('about', $data);
    }
}