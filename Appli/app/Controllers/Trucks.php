<?php

namespace App\Controllers;

use App\Models\TrucksModel;
use App\Models\DatabaseModel;
use App\Models\CityModel;
use App\Models\SpecialiteModel;

class Trucks extends BaseController {
    public function findTruck(){
        $db = new DatabaseModel();
        $spe = $_POST["specialite"];
        if ($spe == "default"){
            $spe = null;
        }
        $ville = $_POST["cities"];
        if ($ville == "default"){
            $ville = null;
        }
        $trucks = $db->getTruck($spe,$ville);

        $spe = new SpecialiteModel();
        $specialites = $spe -> findAll();
        $ville = new CityModel();
        $cities = $ville -> findAll();

        return view('templates/header')
        . view('findtruck',compact('trucks','specialites','cities'));
    }

    public function infoPage(){
        $db = new DatabaseModel();
        $truck = $db -> findTruck($_GET['id']);
        $truck = $truck[0];

        return view('templates/header')
        . view('truck',compact('truck'));
    }

    public function cartePage(){
        $db = new DatabaseModel();
        $carte = $db -> findCarte($_GET['id']);
        $carte = $carte[0];
        $carte = unserialize($carte->Carte);
        $id_ft = $_GET['id'];

        return view('templates/header')
        . view('carte',compact('carte','id_ft'));
    }
}
?>