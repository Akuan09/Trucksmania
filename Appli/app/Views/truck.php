
    <main>
        <?php
            $horaire = unserialize($truck->Horaires);
        ?>
        <div class="container-fluid">
            <div class="row">
                <h1><?=$truck->Nom?></h1>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Spécialités : <?=$truck->Spe?></h3>
                </div>
                <div class="col">
                    <h3>Adresse : <?=$truck->Adresse?></h3>
                </div>
            </div>
            <div class="row">
                <h3>Horaires :</h3>
                <div class="col-2">
                    <p>Lundi : <?=$horaire['lundi']?></p>
                    <p>Mardi : <?=$horaire['mardi']?></p>
                    <p>Mercredi : <?=$horaire['mercredi']?></p>
                </div>
                <div class="col-2">
                    <p>Jeudi : <?=$horaire['jeudi']?></p>
                    <p>Vendredi : <?=$horaire['vendredi']?></p>
                    <p>Samedi : <?=$horaire['samedi']?></p>
                </div>
                <div class="col-2">
                    <p>Dimanche : <?=$horaire['dimanche']?></p>
                </div>
                <div class="col">
                    <a href='http://localhost/carte?id=<?=$truck->id_food_truck?>'><button class="btn btn-success btn-lg">Voir la carte</button></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>