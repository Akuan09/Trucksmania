<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\SpecialiteModel;
use App\Models\CityModel;

class Pages extends BaseController{
    public function view($page="accueil")
    {
        if ($page == "client" || $page== "gerant"){
            $page = "connexion/".$page;
        }

        if ($page == "clients" || $page == "gerants"){
            $page = "inscription/".$page;
        }

        if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        return view('templates/header')
            . view($page);
    }

    public function logOut(){
        session_start();
        session_destroy();
        setcookie('PHPSESSID');
        $spe = new SpecialiteModel();
            $specialites = $spe -> findAll();
        $ville = new CityModel();
        $cities = $ville -> findAll();

        return view("templates/header")
        . view("accueil",compact('specialites','cities'));
    }
}