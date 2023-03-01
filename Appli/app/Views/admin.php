
    <main>
        <div class="container-fluid">
            <div class="row text-center mt-3">
                <h1>Page administrateur</h1>
            </div>
            <div class="row mt-3">
                <div class="col-xs-12 col-md-6 border border-danger">
                    <div class="row text-center">
                        <h2>Utilisateurs</h2><hr>
                    </div>
                    <div class="row">
                        <a href='#users' class='btn btn-light'>Utilisateurs</a>
                        <a href='#gerants' class='btn btn-light'>Gerants</a><hr>
                    </div>
                    <div class="row" id="users">
                        <h3>Utilisateurs classiques :</h3>
                    </div>
                    <?php
                        foreach($users as $k => $v){
                            if ($v->Nom != "Just" && $v->Prenom!="Visiteurs"){
                                echo "
                                <div class='row border border-dark d-flex align-items-center'>
                                <div class='col'>
                                    <p>$v->Nom $v->Prenom</p>
                                </div>
                                <div class='col'>
                                    <p>$v->Tel</p>
                                    <p>$v->Mail</p>
                                </div>
                                <div class='col'>
                                    <p>$v->Adresse</p>
                                </div>
                                <div class='col'>
                                    <p>$v->Role</p>
                                </div>
                                <div class='col'>
                                    <a href='http://localhost/changeUser?id=$v->id_user' class='btn btn-success'>Modifier</a>
                                    <a href='http://localhost/deleteUser?id=$v->id_user' class='btn btn-danger'>Supprimer</a>
                                </div>
                                </div>";
                            }
                        }
                        
                    ?>
                    <div class="row" id="gerants">
                        <h3>Gerants de Food-trucks :</h3>
                    </div>
                    <?php
                        foreach($gerants as $k => $v){
                            if ($v->Nom != "Just" && $v->Prenom!="Visiteurs"){
                                echo "
                                <div class='row border border-dark d-flex align-items-center'>
                                <div class='col'>
                                    <p>$v->Nom $v->Prenom</p>
                                </div>
                                <div class='col'>
                                    <p>$v->Tel</p>
                                    <p>$v->Mail</p>
                                </div>
                                <div class='col'>
                                    <p>$v->Adresse</p>
                                </div>
                                
                                <div class='col'>
                                    <a href='http://localhost/changeGerant?id=$v->id_gerant' class='btn btn-success'>Modifier</a>
                                    <a href='http://localhost/deleteGerant?id=$v->id_gerant' class='btn btn-danger'>Supprimer</a>
                                </div>
                                </div>";
                            }
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-md-6 border border-success">
                    <div class="row text-center">
                        <h2>Food-Trucks</h2><hr>
                    </div>
                    <?php
                        foreach($trucks as $k => $v){
                            $horaire = unserialize($v->Horaires);
                            echo "
                            <div class='row border border-dark d-flex align-items-center'>
                            <div class='col'>
                                <p>$v->Nom</p>
                            </div>
                            <div class='col'>
                                <p>$v->GNom $v->GPrenom</p>
                            </div>
                            <div class='col'>
                                <p>$v->Adresse</p>
                            </div>
                            <div class='col'>
                                <p>Lundi : ".$horaire['lundi']."</p>
                                <p>Mardi : ".$horaire['mardi']."</p>
                                <p>Mercredi : ".$horaire['mercredi']."</p>
                            </div>
                            <div class='col'>
                                <p>Jeudi : ".$horaire['jeudi']."</p>
                                <p>Vendredi : ".$horaire['vendredi']."</p>
                                <p>Samedi : ".$horaire['samedi']."</p>
                            </div>
                            <div class='col'>
                                <p>Dimanche : ".$horaire['dimanche']."</p>
                            </div>
                            <div class='col'>
                                <p>$v->Spe</p>
                                <p>$v->Ville</p>
                            </div>
                            <div class='col'>
                                <a href='http://localhost/changeTruck?id=$v->id_food_truck' class='btn btn-success'>Modifier</a>
                                <a href='http://localhost/deleteTruck?id=$v->id_food_truck' class='btn btn-danger'>Supprimer</a>
                            </div>
                            </div>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>