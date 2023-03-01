<?php

namespace App\Controllers;

use App\Models\DatabaseModel;
use App\Models\TrucksModel;
use App\Models\CityModel;
use App\Models\SpecialiteModel;

use App\Controllers\Verif;

class gestionTruck extends BaseController {
    public function modifPage(){
        $db = new DatabaseModel();
        $truck = $db->findTruck($_GET['id']);

        return view('templates/header')
        . view('modifTruck',compact('truck'));
    }

    public function getSpeCity(){
        $db = new DatabaseModel();
        $spe = $db->getSpe();
        $cities = $db->getCities();

        return view('templates/header')
        . view('newTruck',compact('spe','cities'));
    }

    public function addTruck(){
        session_start();
        $db = new DatabaseModel();
        $trucks = new TrucksModel();

        $horaires = [
            "lundi" => $_POST['lundi'],
            "mardi" => $_POST['mardi'],
            "mercredi" => $_POST['mercredi'],
            "jeudi" => $_POST['jeudi'],
            "vendredi" => $_POST['vendredi'],
            "samedi" => $_POST['samedi'],
            "dimanche" => $_POST['dimanche'],
        ];

        $carte = [];
        $offre = [];
        $lala = null;
        foreach ($_POST as $k => $v){
            if (explode('_',$k)[0]=='cat'){
                $lala = $v;
                $carte[$v] = [];
            }
            if (explode('_',$k)[0]==$lala){
                array_push($offre,$k);
            }
        }

        foreach ($carte as $k => $v){
            for ($i=0;$i<count($offre);$i+=2){
                if (explode("_",$offre[$i])[0]==$k){
                    $carte[$k][$_POST[$offre[$i]]] = $_POST[$offre[$i+1]];
                }
            }
        }

        $id = $db->getGId($_SESSION['mail'])[0]->id_gerant;

        if (gettype($_POST['cities'])=="string"){
            $lala = new CityModel();
            $lolo = ["Nom"=>$_POST['cities']];
            $lala->insert($lolo);
            $city = $db->getCityId($_POST['cities'])[0]->id_ville;
        }else{
            $city = $_POST['cities'];
        }

        if (isset($_POST['spe'])){
            $lili = new SpecialiteModel();
            $lulu = ["Nom"=>$_POST['spe']];
            $lili->insert($lulu);
            $spe = $db->getSpeId($_POST['spe'])[0]->id_specialite;
        }else{
            $spe = $_POST['specialite'];
        }

        $data = ["Nom"=>$_POST['name'],"Carte"=>serialize($carte),"Adresse"=>$_POST['Adresse'],"Horaires"=>serialize($horaires),"id_gerant"=>$id,"id_specialite"=>$spe,"id_ville"=>$city];

        $trucks->insert($data);

        $trucks = $db->getGTruck($_SESSION['mail']);
        return view("templates/header")
        . view("gestiontruck",compact('trucks'));

    }
}
?>