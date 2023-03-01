
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Gestion des food-trucks</h1><hr>
            </div>
            <div class="row">
                <a href='http://localhost/newTruck' class='btn btn-success'>Ajouter un nouveau food-truck</a>
            </div>
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
                            <a href='http://localhost/modif?id=$v->id_food_truck'><button class='btn btn-success'>Modifier /<br>infos</button></a>
                        </div>
                        <div class='col d-flex justify-content-center align-items-center'>
                            <a href='http://localhost/commandGerant?id=$v->id_food_truck'><button class='btn btn-success'>Voir<br>commandes</button></a>
                        </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>