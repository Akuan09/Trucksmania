<?php

namespace App\Controllers;

use App\Models\DatabaseModel;

class GestionEvent extends BaseController {
 
    public function addEvent(){
        session_start();
        $db = new DatabaseModel();

        $id = $db->getId($_SESSION['mail'])[0]->id_user;
        
        $db->newEvent($_POST,$id);

        echo "<div class='bg-info'>La proposition d'évènement a bien été prise en compte.</div>";

        return view('templates/header')
        . view('event');
    }

    public function eventPerso(){
        session_start();

        $db = new DatabaseModel();
        $id = $db->getId($_SESSION['mail'])[0]->id_user;
        $events = $db->getEvent($id);

        foreach($events as $k => $v){
            $temp = $db->getEventA($v->id_evenement);
            if (isset($temp)){
                $v->accept = $temp;
            }
        }

        return view('templates/header')
        . view('eventPerso',compact('events'));
    }

    public function verifRole(){
        session_start();

        if ($_SESSION['role']==25){
            return view('templates/header')
            . view('event');
        }else if($_SESSION['role']==0 || $_SESSION['role']==1){
            $db = new DatabaseModel();
            $events = $db->getAllEvents();
            $eventsA = $db->getAllEventA();
            foreach($events as $k => $v){
                foreach ($eventsA as $key => $value){
                    if ($v->id_evenement == $value->id_evenement){
                        unset($events[$k]);
                    }
                }
            }
            if ($_SESSION['role']==0){
                $trucks = $db->getGTruck($_SESSION['mail']);
                
                return view('templates/header')
                . view('events',compact('events','trucks'));
            }else{
                return view('templates/header')
                . view('eventsAdmin',compact('events'));
            }
        }
    }

    public function acceptEvent(){
        session_start();
        $db = new DatabaseModel();

        $id = $_POST['id'];
        $id_ft = $_POST['truck'];

        $db->newEventA($id,$id_ft);

        $events = $db->getAllEvents();
        $eventsA = $db->getAllEventA();
        foreach($events as $k => $v){
            foreach ($eventsA as $key => $value){
                if ($v->id_evenement == $value->id_evenement){
                    unset($events[$k]);
                }
            }
        }
        $trucks = $db->getGTruck($_SESSION['mail']);

        return view('templates/header')
        . view('events',compact('events','trucks'));
    }

    public function myEvent(){
        // Pour tout les food trucks que le gérant a, il faut récup tout les events 
        // (faudra aussi afficher à quel truck correspond quel event)
        session_start();
        $db = new DatabaseModel();
        $trucks = $db->getGTruck($_SESSION['mail']);

        $events = [];

        foreach ($trucks as $k => $v){
            $events[$v->id_food_truck] = $db->getEventF($v->id_food_truck);
        }

        return view('templates/header')
        . view('myEvent',compact('events','trucks'));
    }

    public function supprEvent(){
        $db = new DatabaseModel();
        $db->delEvent($_POST['id']);

        $vue = $this->myEvent();
        return $vue;
    }
}
?>