<?php

namespace App\Controllers;

use App\Models\SpecialiteModel;
use App\Models\CityModel;
use App\Models\TrucksModel;
use App\Models\DatabaseModel;

class InfosTrucks extends BaseController {

    public function getData(){
        $spe = new SpecialiteModel();
        $specialites = $spe -> findAll();

        $ville = new CityModel();
        $cities = $ville -> findAll();

        $db = new DatabaseModel();
        $trucks = $db->getTruck();

        return view("templates/header")
        . view("findtruck",compact("trucks","specialites","cities"));
    }

}
?>