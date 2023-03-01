
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Commandes</h1>
            </div>
            <div class="row">
                <h2>Commandes Prioritaires :</h2>
                <?php
                    $price = 0;
                    foreach ($commandR as $k=>$v){
                        echo "
                        <div class='row border border-dark'>
                            <div class='col'>
                                <h4>Type : $v->Type_commande</h4>
                            </div>";
                        if ($v->Adresse!=""){
                            echo "
                            <div class='col'>
                                <h4>Adresse : $v->Adresse</h4>
                            </div>";
                        }
                        if ($v->Type_paiement == "Sur Place"){
                            echo "
                            <div class='col'>
                                <h4>Paiement : A payer</h4>
                            </div>";
                        }else{
                            echo "
                            <div class='col'>
                                <h4>Paiement : Déjà réglé</h4>
                            </div>";
                        }
                        echo "
                        <div class='col'>
                            <h4>Commande : </h4>";
                        foreach(unserialize($v->Contenu) as $key => $value){
                            echo "
                            <h5>$value->name($value->price)</h5>";
                            $price += floatval($value->price);
                        } 
                        echo "
                        </div>
                        <div class='col d-flex align-items-center'>
                            <h4>Total : $price €</h4>
                        </div>
                        <div class='col d-flex align-items-center'>
                            <a href='http://localhost/supprCommand?id=$v->id_commande' class='btn btn-success'>Commandes effectuées</a>
                        </div>
                        </div>";
                    }
                ?>
            </div>
            <div class="row mt-3">
                <h2>Commandes Non Prioritaires :</h2>
                <?php
                    $price = 0;
                    foreach ($command as $k=>$v){
                        echo "
                        <div class='row border border-dark'>
                            <div class='col'>
                                <h4>Type : $v->Type_commande</h4>
                            </div>";
                        if ($v->Adresse!=""){
                            echo "
                            <div class='col'>
                                <h4>Adresse : $v->Adresse</h4>
                            </div>";
                        }
                        if ($v->Type_paiement == "Sur Place"){
                            echo "
                            <div class='col'>
                                <h4>Paiement : A payer</h4>
                            </div>";
                        }else{
                            echo "
                            <div class='col'>
                                <h4>Paiement : Déjà réglé</h4>
                            </div>";
                        }
                        echo "
                        <div class='col'>
                            <h4>Commande : </h4>";
                        foreach(unserialize($v->Contenu) as $key => $value){
                            echo "
                            <h5>$value->name($value->price)</h5>";
                            $price += floatval($value->price);
                        } 
                        echo "
                        </div>
                        <div class='col d-flex align-items-center'>
                            <h4>Total : $price €</h4>
                        </div>
                        <div class='col d-flex align-items-center'>
                            <a href='http://localhost/supprCommand?id=$v->id_commande' class='btn btn-success'>Commandes effectuées</a>
                        </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>