<?php

namespace App\Controllers;

use App\Controllers\GestionEvent;

use App\Models\DatabaseModel;

class CRUD extends BaseController {

    function loadPage(){
        $db = new DatabaseModel();
        $trucks = $db->getFoodTrucks();
        $users = $db->getUsers();
        $gerants = $db->getGerants();

        return view('templates/header')
        . view('admin',compact('trucks','users','gerants'));
    }

    function changeUser(){
        $db = new DatabaseModel();
        $user = $db->getUser($_GET['id']);
        $roles = $db->getRoles();

        return view('templates/header')
        . view('changeUser',compact('user','roles'));
    }

    function deleteUser(){
        $db = new DatabaseModel();
        $db->deleteUser($_GET['id']);

        return $this->loadPage();
    }

    function changeGerant(){
        $db = new DatabaseModel();
        $gerant = $db->getGerant($_GET['id']);

        return view('templates/header')
        . view('changeGerant',compact('gerant'));
    }

    function deleteGerant(){
        $db = new DatabaseModel();
        $db->deleteGerant($_GET['id']);

        return $this->loadPage();
    }

    function changeTruck(){
        $db = new DatabaseModel();
        $truck = $db->getFoodTruck($_GET['id']);
        $spe = $db->getSpe();
        $cities = $db->getCities();
        $gerants = $db->getGerants();

        return view('templates/header')
        . view('changeTruck',compact('truck','spe','cities','gerants'));
    }

    function deleteTruck(){
        $db = new DatabaseModel();
        $db->deleteTruck($_GET['id']);

        return $this->loadPage();
    }

    function modif(){
        $db = new DatabaseModel();
        if ($_POST['type'] == "user"){
            $data = ["Nom"=>$_POST['lastname'],"Prenom"=>$_POST['firstname'],"Tel"=>$_POST['tel'],"Mail"=>$_POST['mail'],"Adresse"=>$_POST['adress'],"id_role"=>$_POST['role']];
            $db->updUser($data,$_POST['id']);
        }else if ($_POST['type'] == "gerant"){
            $data = ["Nom"=>$_POST['lastname'],"Prenom"=>$_POST['firstname'],"Tel"=>$_POST['tel'],"Mail"=>$_POST['mail'],"Adresse"=>$_POST['adress']];
            $db->updGerant($data,$_POST['id']);
        }else{
            $data = ["Nom"=>$_POST['name'],"Adresse"=>$_POST['adress'],"id_gerant"=>$_POST['gerant'],"id_specialite"=>$_POST['spe'],"id_ville"=>$_POST['city']];
            $db->updFoodTruck($data,$_POST['id']);
        }

        return $this->loadPage();
    }

    function deleteEvent(){
        $db = new DatabaseModel();
        $db->deleteEvent($_GET['id']);

        $retour = new GestionEvent();
        return $retour->verifRole();
    }
}
?>