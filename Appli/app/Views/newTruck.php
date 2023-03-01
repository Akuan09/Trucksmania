
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Ajouter un nouveau food-truck</h1><hr>
            </div>
            <div class="row">
                <form action="http://localhost/addTruck" method="POST">
                    <div class="row form-group">
                        <input type="text" name="name" placeholder="Nom du Truck" class="form-control mb-1" required>
                        <input type="text" name="Adresse" placeholder="Adresse du Truck" class="form-control mb-1" required>
                        <div id='divCity'>
                            <select name="cities" class="form-control mb-1" id='select'>
                                <option value="default">Ville</option>
                                <?php
                                    foreach ($cities as $k => $v){
                                        echo "<option value=".$v->id_ville.">".$v->Nom."</option>";
                                    }
                                ?>
                                <option value="add" id="addCity">Ville pas dans la liste ?</option>
                            </select>
                        </div>
                        <div id='divSpe'>        
                            <select name="specialite" class="form-control mb-1" id="select2">
                                <option value="default">Spécialité</option>
                                <?php
                                    foreach ($spe as $k => $v){
                                        echo "<option value=".$v->id_specialite.">".$v->Nom."</option>";
                                    }
                                ?>
                                <option value="add" id="addSpe">Spécialité pas dans la liste ?</option>
                            </select>                       
                        </div>
                    </div>
                    <div class="row form-group">
                        <legend>Horaires</legend>
                        <p>(Format : 00H00-00H00 / fermé)</p>
                        <div class='col-2'>
                            <label for="lundi">Lundi</label>
                            <input type="text" name="lundi" placeholder="00H00-00H00" class='form-control' required>
                            <label for="mardi">Mardi</label>
                            <input type="text" name="mardi" placeholder="00H00-00H00" class='form-control' required>
                            <label for="mercredi">Mercredi</label>
                            <input type="text" name="mercredi" placeholder="00H00-00H00" class='form-control' required>
                        </div>
                        <div class="col-2">
                            <label for="jeudi">Jeudi</label>
                            <input type="text" name="jeudi" placeholder="00H00-00H00" class='form-control' required>
                            <label for="vendredi">Vendredi</label>
                            <input type="text" name="vendredi" placeholder="00H00-00H00" class='form-control' required>
                            <label for="samedi">Samedi</label>
                            <input type="text" name="samedi" placeholder="00H00-00H00" class='form-control' required>
                        </div>
                        <div class="col-2">
                            <label for="dimanche">Dimanche</label>
                            <input type="text" name="dimanche" placeholder="00H00-00H00" class='form-control' required>
                        </div>
                    </div>
                    <div class="row form-group mt-1" id='carteCtn'>
                        <legend>Carte</legend>
                        <div class="col">
                            <div class='btn btn-danger' id='addCat'>Ajouter une catégorie</div>
                        </div>
                    </div>
                    <input type="submit" value="Ajouter le food-truck" class='btn btn-success btn-lg mt-5'>
                </form>
            </div>
        </div>
    </main>
    <script src='http://localhost/js/newtruck.js'></script>
    <script src='http://localhost/js/newCity.js'></script>
    <script src='http://localhost/js/newSpe.js'></script>
</body>
</html>