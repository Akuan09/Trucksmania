
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Evènements</h1>
            </div>
            <?php
            foreach ($events as $k => $v){
                echo "
                <div class='row border border-black mt-4'>
                    <div class='col'>
                        <h4>$v->Lieu</h4>
                    </div>
                    <div class='col'>
                        <h4>Date : $v->Date ($v->Duree jours)</h4>
                    </div>
                    <div class='col'>
                        <h4>Proposé par : $v->Nom $v->Prenom</h4>
                    </div>
                    <div class='col'>
                        <h4>Estimation du nombre de clients : $v->Estimation_client</h4>
                    </div>
                    <div class='col d-flex justify-content-center align-items-center'>
                        <a href='http://localhost/deleteEvent?id=$v->id_evenement' class='btn btn-danger btn-lg'>Supprimer</a>
                    </div>
                </div>";
            }
            ?>
        </div>
    </main>
</body>
</html>