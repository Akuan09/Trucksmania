<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\GerantsModel;

class CreateAccount extends BaseController {

    public function start(){
        if ($_POST['page']=="client"){
            $db = new UsersModel();
        }else{
            $db = new GerantsModel();
        }
        $data = $db -> findAll();
        if ($this->verifIfExist($_POST,$data)){
            $message = "Erreur lors de l'inscription : un compte existe déjà avec cette adresse mail";
            echo "<div class='bg-info'>$message</div>";
            return view('templates/header')
            . view('inscription/'.$_POST['page'].'s');
        }else{
            if ($this->verifPsw($_POST)){
                $this->createAccount($_POST,$db);
                echo "<div class='bg-info'>Compte bien crée</div>";
                return view('templates/header')
                . view('connexion/'.$_POST['page']);
            }else{
                $message = "Erreur lors de l'inscription : les mots de passes ne correspondent pas";
                echo "<div class='bg-info'>$message</div>";
                return view('templates/header')
                . view('inscription/'.$_POST['page'].'s');
            }
        }
    }

    private function verifIfExist($user,$bdd){
        foreach ($bdd as $k=>$v){
            if ($user['mail']==$v['Mail']){
                return true;
            }
        }
        return false;
    }

    private function verifPsw($user){
        if ($user['psw']==$user['psw2']){
            return true;
        }
        return false;
    }

    private function createAccount($user,$db){
        if (isset($user['pro'])){
            $role = 25;
        }else{
            $role = 24;
        }
        $user = ["Nom"=>$user["lastname"],"Prenom"=>$user["firstname"],"Tel"=>$user["tel"],"Mail"=>$user["mail"],"Adresse"=>$user["adress"],"Mdp"=>password_hash($user["psw"],PASSWORD_DEFAULT),"id_role"=>$role];
        $db->insert($user);
    }
}
?>