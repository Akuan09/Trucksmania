<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\DatabaseModel;

class Command extends BaseController {

    public function start(){
        session_start();
        setcookie('id_ft',$_POST['id_ft']);
        if (isset($_SESSION['firstname'])){
            return $this->commandPage();
        }else{
            return view('templates/header')
            . view('coCommand');
        }
    }

    public function commandPage(){
        return view('templates/header')
        . view('commandDomicile');
    }

    public function verifConnection(){
        $db = new UsersModel();
        $users = $db->findAll();
        foreach ($users as $k=>$v){
            if ($v['Mail']==$_POST['mail'] && password_verify($_POST['psw'],$v['Mdp'])){
                $this->openSession($v);
                return $this->commandPage();
            }
        }
        echo "<div class='bg-info'>Erreur de connexion : vérifiez vos identifiants</div>";
        return view('templates/header')
        . view('coCommand');
    }

    private function openSession($user){
        session_start();
        $_SESSION["lastname"] = $user["Nom"]; 
        $_SESSION["firstname"] = $user["Prenom"]; 
        $_SESSION["tel"] = $user["Tel"]; 
        $_SESSION["mail"] = $user["Mail"]; 
        $_SESSION["adress"] = $user["Adresse"]; 
        $_SESSION["psw"] = $user["Mdp"];
        $_SESSION["role"] = $user['id_role'];
    }

    public function addCommand(){
        session_start();
        $db = new DatabaseModel();
        $command = json_decode($_COOKIE['commande']);

        if (isset($_POST['numCB'])){
            $paiement = "En Ligne";
        }else{
            $paiement = "Sur Place";
        }

        if (isset($_SESSION['firstname'])){
            $rapide = true;
            $id_user = $db->getId($_SESSION['mail'])[0]->id_user;
        }else{
            $rapide = false;
            $id_user = 5;
        }

        if (isset($_POST['adress'])){
            $adresse = $_POST['adress'];
        }else{
            $adresse= null;
        }

        $data = ["Contenu"=>serialize($command),"Date_commande"=>time(),"Type_paiement"=>$paiement,"Type_commande"=>$_POST['typeCommand'],"Adresse"=>$adresse,"Rapide"=>$rapide,"id_user"=>$id_user,"id_food_truck"=>$_COOKIE['id_ft']];

        $db->newCommand($data);
        setcookie('commande');
        setcookie('id_ft');

        return view('templates/header')
        . view('commandeClear');
    }

    function gerantPage(){
        $db = new DatabaseModel();
        $commandR = $db->getCommandR($_GET['id']);
        $command = $db->getCommand($_GET['id']);

        return view('templates/header')
        . view('commandGerant',compact('command','commandR'));
    }

    function supprCommand(){
        $db = new DatabaseModel();
        $db->supprCommand($_GET['id']);

        $commandR = $db->getCommandR($_GET['id']);
        $command = $db->getCommand($_GET['id']);

        return view('templates/header')
        . view('commandGerant',compact('command','commandR'));
    }
}

?>