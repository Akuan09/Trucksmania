
    <main>
        <div class="container-fluid">
            <form action="http://localhost/find" method="POST">
                <div class="row mt-5 border border-dark p-2">
                    <div class="col-xs-12 offset-md-2 col-md-4">
                        <select name="specialite" class="form-control">
                            <option value="default">Spécialité</option>
                            <?php
                            foreach ($specialites as $k => $v){
                                echo "<option value=".$v['Nom'].">".$v['Nom']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <select name="cities" class="form-control">
                            <option value="default">Villes</option>
                            <?php
                            foreach ($cities as $k => $v){
                                echo "<option value=".$v['Nom'].">".$v['Nom']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="submit" value="Chercher" class="btn btn-success">
                    </div>
                </div>
            </form>
            
            <?php
                if (isset($trucks)){
                    foreach ($trucks as $k=>$v){
                        $horaire = unserialize($v->Horaires);
                        echo "<div class='row border border-dark mt-5 p-2'>
                        <div class='col'>
                            <h2 class='ms-1'>".$v->Nom."</h2>
                        </div>
                        <div class='col'>
                            <h4>Horaires :</h4>
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
                            <h4>Spécialité :</h4>
                            <p>".$v->Spe."</p>
                            <h4>Ville :</h4>
                            <p>".$v->Ville."</p>
                        </div>
                        <div class='col d-flex justify-content-center align-items-center'>
                            <a href='http://localhost/truck?id=$v->id_food_truck'><button class='btn btn-success'>+ d'infos /<br>Commander</button></a>
                        </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>

