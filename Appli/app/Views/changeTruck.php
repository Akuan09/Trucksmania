<?php
    $truck = $truck[0];
?>
    <main>
        <div class="container">
            <div class="row text-center mt-3 mb-5">
                <h1>Modifier les informations du food-truck</h1>
            </div>
            <form action="http://localhost/admin" method='POST'>
                <input type="hidden" name="type" value='food_truck'>
                <input type="hidden" name="id" value=<?=$truck->id_food_truck?>>
                <label for="name">Nom :</label>
                <input type="text" name="name" class='form-control mb-2' value=<?=$truck->Nom?>>
                <label for="adress">Adresse :</label>
                <input type="text" name="adress" class='form-control mb-2' value=<?=$truck->Adresse?>>
                <label for="city">Ville :</label>
                <select name="city" class="form-control mb-2">
                    <option value=<?=$truck->id_ville?>><?=$truck->Ville?></option>
                    <?php
                    foreach ($cities as $k => $v){
                        if ($v->id_ville != $truck->id_ville){
                            echo "<option value=$v->id_ville>$v->Nom</option>";
                        }
                    }
                    ?>
                </select>
                <label for="spe">Spécialité :</label>
                <select name="spe" class="form-control mb-2">
                    <option value=<?=$truck->id_specialite?>><?=$truck->Spe?></option>
                    <?php
                    foreach ($spe as $k => $v){
                        if ($v->id_specialite != $truck->id_specialite){
                            echo "<option value=$v->id_specialite>$v->Nom</option>";
                        }
                    }
                    ?>
                </select>
                <label for="gerant">Gerant :</label>
                <select name="gerant" class="form-control mb-2">
                    <option value=<?=$truck->id_gerant?>><?=$truck->GNom." ".$truck->GPrenom?></option>
                    <?php
                    foreach ($gerants as $k => $v){
                        if ($v->id_gerant != $truck->id_gerant){
                            echo "<option value=$v->id_gerant>$v->Nom $v->Prenom</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Valider" class='btn btn-success'>
            </form>
        </div>
    </main>
</body>
</html>