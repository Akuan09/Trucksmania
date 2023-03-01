<?php

namespace App\Controllers;

use App\Models\test;
use App\Models\SpecialiteModel;
use App\Models\CityModel;

class Home extends BaseController
{
    public function index()
    {
        $spe = new SpecialiteModel();
        $specialites = $spe -> findAll();

        $ville = new CityModel();
        $cities = $ville -> findAll();

        return view("templates/header")
        . view('accueil',compact('specialites','cities'));
    }
}
