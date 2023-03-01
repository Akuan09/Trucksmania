<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class DatabaseModel extends Model
    {
        private function getData(){
            return \config\Database::connect();
        }
        
        public function getCities(){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Villes");
            $results = $query->getResult();
            return $results;
        }

        public function getSpe(){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Specialites");
            $results = $query->getResult();
            return $results;
        }

        public function getTruck($idspe=null,$idcity=null){
            $db = $this->getData();
            if (is_null($idspe) && is_null($idcity)){
                $query = $db->query("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, v.Nom as Ville, s.Nom as Spe FROM Food_trucks f JOIN Villes v ON f.id_ville=v.id_ville JOIN Specialites s ON f.id_specialite=s.id_specialite");
                return $query->getResult();
            }else if (is_null($idspe) && isset($idcity)){
                $query = $db->query("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, v.Nom as Ville, s.Nom as Spe FROM Food_trucks f JOIN Villes v ON f.id_ville=v.id_ville JOIN Specialites s ON f.id_specialite=s.id_specialite WHERE v.Nom = '$idcity'");
                return $query->getResult();
            }else if (is_null($idcity) && isset($idspe)){
                $query = $db->query("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, v.Nom as Ville, s.Nom as Spe FROM Food_trucks f JOIN Villes v ON f.id_ville=v.id_ville JOIN Specialites s ON f.id_specialite=s.id_specialite WHERE s.Nom = '$idspe'");
                return $query->getResult();
            }else{
                $query = $db->query("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, v.Nom as Ville, s.Nom as Spe FROM Food_trucks f JOIN Villes v ON f.id_ville=v.id_ville JOIN Specialites s ON f.id_specialite=s.id_specialite WHERE v.Nom = '$idcity' AND s.Nom = '$idspe'");
                return $query->getResult();
            }
        }

        public function findTruck($id){
            $db = $this->getData();
            $query = $db->query ("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, v.Nom as Ville, s.Nom as Spe FROM Food_trucks f JOIN Villes v ON f.id_ville=v.id_ville JOIN Specialites s ON f.id_specialite=s.id_specialite WHERE f.id_food_truck = '$id'");
            return $query->getResult();
        }

        public function findCarte($id){
            $db = $this->getData();
            $query = $db->query("SELECT Carte FROM Food_trucks WHERE id_food_truck='$id'");
            return $query->getResult();
        }

        public function getGTruck($mail){
            $db = $this->getData();
            $query = $db->query("SELECT f.id_food_truck, f.Nom, f.Carte, f.Adresse, f.Horaires, s.Nom as Spe, v.Nom as Ville FROM Food_trucks f JOIN Gerants g ON f.id_gerant=g.id_gerant JOIN Specialites s ON f.id_specialite=s.id_specialite JOIN Villes v ON v.id_ville=f.id_ville  WHERE g.Mail = '$mail'");
            return $query->getResult();
        }

        public function getGId($mail){
            $db = $this->getData();
            $query = $db->query("SELECT id_gerant FROM Gerants WHERE Mail='$mail'");
            return $query->getResult();
        }

        public function getId($mail){
            $db = $this->getData();
            $query = $db->query("SELECT id_user FROM Users WHERE Mail='$mail'");
            return $query->getResult();
        }

        public function newEvent($data,$id){
            $db = $this->getData();
            $db->query("INSERT INTO Evenements (Lieu,Date,Duree,Estimation_client,id_user) VALUES ('{$data['lieu']}','{$data['date']}','{$data['duree']}','{$data['nbClient']}','{$id}')");
        }

        public function getEvent($id){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Evenements WHERE id_user = '$id'");
            return $query->getResult();
        }

        public function getEventA($id){
            $db = $this->getData();
            $query = $db->query("SELECT ft.id_evenement,f.Nom,g.Tel,g.Mail FROM Food_truck_evenements ft JOIN Food_trucks f ON f.id_food_truck=ft.id_food_truck JOIN Gerants g ON g.id_gerant=f.id_gerant WHERE id_evenement = '$id'");
            return $query->getResult();
        }

        public function getAllEvents(){
            $db = $this->getData();
            $query = $db->query("SELECT e.*,u.Nom,u.Prenom,u.Tel,u.Mail FROM Evenements e JOIN Users u ON e.id_user=u.id_user");
            return $query->getResult();
        }

        public function getAllEventA(){
            $db = $this->getData();
            $query = $db->query("SELECT id_evenement FROM Food_truck_evenements");
            return $query->getResult();
        }

        public function getCityId($nom){
            $db = $this->getData();
            $query = $db->query("SELECT id_ville FROM Villes WHERE Nom='$nom'");
            return $query->getResult();
        }

        public function getSpeId($nom){
            $db = $this->getData();
            $query = $db->query("SELECT id_specialite FROM Specialites WHERE Nom='$nom'");
            return $query->getResult();
        }

        public function newEventA($id,$id_ft){
            $db = $this->getData();
            $db->query("INSERT INTO Food_truck_evenements (id_food_truck,id_evenement) VALUES ('$id_ft','$id')");
        }

        public function getEventF($id){
            $db = $this->getData();
            $query = $db->query("SELECT e.*,u.Nom,u.Prenom,u.Tel,u.Mail FROM Food_truck_evenements ft JOIN Evenements e ON e.id_evenement=ft.id_evenement JOIN Users u ON e.id_user=u.id_user WHERE ft.id_food_truck='$id'");
            return $query->getResult(); 
        }

        public function delEvent($id){
            $db = $this->getData();
            $db->query("DELETE FROM Food_truck_evenements WHERE id_evenement='$id'");
        }

        public function upd($table,$data,$id,$cond){
            $db = $this->getData();
            $db->query("UPDATE $table SET Nom='{$data['lastname']}', Prenom='{$data['firstname']}', Tel='{$data['tel']}', Mail='{$data['mail']}', Adresse='{$data['adress']}' WHERE $cond='$id'");
        }

        public function newCommand($data){
            $db = $this->getData();
            $db->query("INSERT INTO Commandes (Contenu,Date_commande,Type_paiement,Type_commande,Adresse,Rapide,id_user,id_food_truck) VALUES ('{$data['Contenu']}','{$data['Date_commande']}','{$data['Type_paiement']}','{$data['Type_commande']}','{$data['Adresse']}','{$data['Rapide']}','{$data['id_user']}','{$data['id_food_truck']}')");
        }

        public function getCommand($id){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Commandes WHERE id_food_truck='$id' AND Rapide=0 ORDER BY Date_commande");
            return $query->getResult();
        }

        public function getCommandR($id){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Commandes WHERE id_food_truck='$id' AND Rapide=1 ORDER BY Date_commande");
            return $query->getResult();
        }

        public function supprCommand($id){
            $db = $this->getData();
            $db->query("DELETE FROM Commandes WHERE id_commande='$id'");
        }

        public function getUsers(){
            $db = $this->getData();
            $query = $db->query("SELECT u.*, r.Nom as Role FROM Users u JOIN Roles r ON u.id_role=r.id_role");
            return $query->getResult();
        }

        public function getGerants(){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Gerants");
            return $query->getResult();
        }

        public function getFoodTrucks(){
            $db = $this->getData();
            $query = $db->query("SELECT f.*,g.Nom as GNom,g.Prenom as GPrenom, s.Nom as Spe, v.Nom as Ville FROM Food_trucks f JOIN Gerants g ON g.id_gerant=f.id_gerant JOIN Specialites s ON s.id_specialite=f.id_specialite JOIN Villes v ON v.id_ville=f.id_ville");
            return $query->getResult();
        }

        public function deleteUser($id){
            $db = $this->getData();
            $db->query("DELETE FROM Users WHERE id_user='$id'");
        }

        public function deleteGerant($id){
            $db = $this->getData();
            $db->query("DELETE FROM Gerants WHERE id_gerant='$id'");
        }

        public function deleteTruck($id){
            $db = $this->getData();
            $db->query("DELETE FROM Food_trucks WHERE id_food_truck='$id'");
        }

        public function getUser($id){
            $db = $this->getData();
            $query = $db->query("SELECT u.*, r.Nom as Role FROM Users u JOIN Roles r ON u.id_role=r.id_role WHERE id_user='$id'");
            return $query->getResult();
        }

        public function getRoles(){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Roles");
            return $query->getResult();
        }

        public function updUser($data,$id){
            $db = $this->getData();
            $db->query("UPDATE Users SET Nom='{$data['Nom']}',Prenom='{$data['Prenom']}',Tel='{$data['Tel']}',Mail='{$data['Mail']}',Adresse='{$data['Adresse']}',id_role='{$data['id_role']}' WHERE id_user='$id'");
        }

        public function getGerant($id){
            $db = $this->getData();
            $query = $db->query("SELECT * FROM Gerants");
            return $query->getResult();
        }

        public function updGerant($data,$id){
            $db = $this->getData();
            $db->query("UPDATE Gerants SET Nom='{$data['Nom']}',Prenom='{$data['Prenom']}',Tel='{$data['Tel']}',Mail='{$data['Mail']}',Adresse='{$data['Adresse']}' WHERE id_gerant='$id'");
        }

        public function getFoodTruck($id){
            $db = $this->getData();
            $query = $db->query("SELECT f.*,g.Nom as GNom,g.Prenom as GPrenom, s.Nom as Spe, v.Nom as Ville FROM Food_trucks f JOIN Gerants g ON g.id_gerant=f.id_gerant JOIN Specialites s ON s.id_specialite=f.id_specialite JOIN Villes v ON v.id_ville=f.id_ville WHERE f.id_food_truck='$id'");
            return $query->getResult();
        }

        public function updFoodTruck($data,$id){
            $db = $this->getData();
            $db->query("UPDATE Food_trucks SET Nom='{$data['Nom']}',Adresse='{$data['Adresse']}', id_gerant='{$data['id_gerant']}', id_specialite='{$data['id_specialite']}',id_ville='{$data['id_ville']}' WHERE id_food_truck='$id'");
        }

        public function deleteEvent($id){
            $db = $this->getData();
            $db->query("DELETE FROM Evenements WHERE id_evenement='$id'");
        }
    }

?>