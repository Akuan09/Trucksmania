<?php

namespace App\Controllers;

use App\Models\DatabaseModel;

class ModifAccount extends BaseController {
    
    public function modifData(){
        session_start();
        $db = new DatabaseModel();

        if ($_SESSION['role']==0){
            $id = $db->getGId($_SESSION['mail'])[0]->id_gerant;
            $lala = "id_gerant";
            $db -> upd("Gerants",$_POST,$id,$lala);
        }else if ($_SESSION['role']==24 || $_SESSION['role']==25){
            $id = $db->getId($_SESSION['mail'])[0]->id_user;
            $lala = "id_user";
            $db -> upd("Users",$_POST,$id,$lala);
        }

        foreach ($_POST as $k=>$v){
            $_SESSION[$k] = $v;
        }

        return view('templates/header')
        . view('infos-personnelles');
    }
}
?>