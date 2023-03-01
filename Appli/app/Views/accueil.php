<?php
// var_dump($specialites);
// var_dump($cities);
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 mt-5">
                    <h1 class='mt-5 mb-3'>Trucksmania</h1>
                    <h4 class='mb-2'>Trucksmania est un site d'information ainsi que de commandes de food-trucks.</h4>
                    <h4 class='mb-2'>En tant que client, vous pouvez trouver le food-truck que vous souhaitez et y passer une commande.</h4>
                    <h4>Et si vous avez un food-truck et que vous voulez faire partie de l'aventure Trucksnmania, vous n'avez qu'à inscire votre truck et commencer à préparer vos commandes.</h4>
                </div>
                <div class="col-xs-12 offset-md-1 col-md-4">
                    <form action="http://localhost/find" method="POST">
                    <div class="row mt-5 border border-dark p-2 text-center">
                        <h1 class='mb-2 mt-3'>Trouver un <br>food-truck</h1>
                        <select name="specialite" class="form-control mt-5 mb-5">
                            <option value="default">Spécialité</option>
                            <?php
                            foreach ($specialites as $k => $v){
                                echo "<option value=".$v['Nom'].">".$v['Nom']."</option>";
                            }
                            ?>
                        </select>
                        <select name="cities" class="form-control mb-5">
                            <option value="default">Villes</option>
                            <?php
                            foreach ($cities as $k => $v){
                                echo "<option value=".$v['Nom'].">".$v['Nom']."</option>";
                            }
                            ?>
                        </select>
                        <input type="submit" value="Chercher" class="btn btn-success mt-5 mb-5">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>