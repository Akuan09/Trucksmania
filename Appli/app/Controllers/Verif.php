<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\GerantsModel;
use App\Models\DatabaseModel;
use App\Models\SpecialiteModel;
use App\Models\CityModel;

class Verif extends BaseController {
    private $id;
    private $pk;

    public function start(){
        if ($_POST['page']=="client.php"){
            $db = new UsersModel();
            $this->pk = "id_user";
        }else{
            $db = new GerantsModel();
            $this->pk = "id_gerant";
        }
        $donnee = $db -> findAll();
        if ($this->verifIfExist($_POST,$donnee) && $this->verifPsw($_POST,$db)){
            $this->openSession($db->find($this->id));
            if ($this->pk == "id_gerant"){
                // $this->gestionTruck($_POST['mail']);
                $db_Gerant = new DatabaseModel();
                $trucks = $db_Gerant->getGTruck($_POST['mail']);

                return view("templates/header")
                . view("gestiontruck",compact('trucks'));
            }else{
                $spe = new SpecialiteModel();
                $specialites = $spe -> findAll();
                $ville = new CityModel();
                $cities = $ville -> findAll();

                return view("templates/header")
                . view("accueil",compact('specialites','cities'));
            }
        }else{
            $message = "Erreur de connexion : vérifiez vos identifiants";
            echo "<div class='bg-info'>$message</div>";
            return view('templates/header')
            . view('connexion/'.explode(".",$_POST['page'])[0]);
        }
    }

    private function verifIfExist($data1,$data2){
        foreach ($data2 as $k=>$v){
            if ($data1['mail']==$v['Mail']){
                $this->id = $v["$this->pk"];
                return true;
            }
        }
        return false;
    }

    private function verifPsw($psw1,$psw2){
        $psw1 = $psw1['psw'];
        $psw2 = $psw2->find($this->id)["Mdp"];
        $lala = password_verify($psw1,$psw2);
        if (password_verify($psw1,$psw2)){
            return true;
        }
        return false;
    }

    private function openSession($user){
        session_start();
        $_SESSION["lastname"] = $user["Nom"]; 
        $_SESSION["firstname"] = $user["Prenom"]; 
        $_SESSION["tel"] = $user["Tel"]; 
        $_SESSION["mail"] = $user["Mail"]; 
        $_SESSION["adress"] = $user["Adresse"]; 
        $_SESSION["psw"] = $user["Mdp"];
        if (isset($user['id_role'])){
            $role = $user['id_role'];
        }else{
            $role = 0;
        }
        $_SESSION["role"] = $role;
    }

    public function gestionTruck(){
        session_start();
        $db_Gerant = new DatabaseModel();
        $trucks = $db_Gerant->getGTruck($_SESSION['mail']);
        return view("templates/header")
        . view("gestiontruck",compact('trucks'));
    }
}
?>