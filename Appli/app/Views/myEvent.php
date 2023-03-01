
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Mes Evènements</h1>
            </div>
            <?php
                foreach($trucks as $k => $v){
                    if (isset($events[$v->id_food_truck][0])){
                        $horaire = unserialize($v->Horaires);
                        echo "
                        <div class='row mt-3'>
                            <h1>$v->Nom :</h1>
                        </div>";
                        foreach ($events[$v->id_food_truck] as $key => $value){
                            echo "<div class='row border border-dark mt-2 p-2'>
                        <div class='col'>
                            <h5 class='ms-1'>".$value->Lieu."</h5>
                        </div>
                        <div class='col'>
                            <h6>Date : $value->Date ($value->Duree jours)</h6>
                        </div>
                        <div class='col'>
                            <h6>Estimation du nombre de clients: $value->Estimation_client</h6>
                        </div>
                        <div class='col'>
                            <h6>Proposé par : $value->Nom $value->Prenom</h6>
                        </div>
                        <div class='col'>
                            <h6>Contact : $value->Tel<br>$value->Mail</h6>
                        </div>
                        <div class='col d-flex align-items-center justify-content-center'>
                            <form action='http://localhost/desister' method='POST'>
                                <input type='hidden' name='id' value=$value->id_evenement>
                                <input type='submit' value='Se désister' class='btn btn-danger btn-lg'>
                            </form>
                        </div>
                        </div>";
                        }
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>