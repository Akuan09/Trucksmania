
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Liste des évènements proposés</h1>
            </div>
            <div class="row mt-2">
                <a href='http://localhost/myEvent' class='btn btn-success'>Mes Evènements</a>
            </div>
                <?php
                    foreach ($events as $k => $v){
                        echo "<div class='row border border-dark mt-3 p-2'>
                        <div class='col'>
                            <h5 class='ms-1'>".$v->Lieu."</h5>
                        </div>
                        <div class='col'>
                            <h6>Date : $v->Date ($v->Duree jours)</h6>
                        </div>
                        <div class='col'>
                            <h6>Estimation du nombre de clients: $v->Estimation_client</h6>
                        </div>
                        <div class='col'>
                            <h6>Proposé par : $v->Nom $v->Prenom</h6>
                        </div>
                        <div class='col'>
                            <h6>Contact : $v->Tel<br>$v->Mail</h6>
                        </div>
                        <div class='col'>
                        <form action='http://localhost/accept' method='POST'>
                        <input type='hidden' name='id' value=$v->id_evenement>
                        <select name='truck' class='form-control mb-1'>";
                            foreach ($trucks as $key => $value){
                                echo "<option value='$value->id_food_truck'>$value->Nom</option>";
                            }
                        echo "
                        <input type='submit' class='btn btn-success' value='Accepter'>
                        </form>
                        </div>
                        </div>";
                    }
                ?>
        </div>
    </main>
</body>
</html>