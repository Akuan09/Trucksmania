
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Mes Propositions</h1>
            </div>
            <div class="row">
                <?php
                    foreach ($events as $k => $v){
                        echo "<div class='row border border-dark mt-5 p-2'>
                        <div class='col'>
                            <h4 class='ms-1'>".$v->Lieu."</h4>
                        </div>
                        <div class='col'>
                            <h5>Date : $v->Date</h5>
                        </div>";
                        if (isset($v->accept[0])){
                            echo "<div class='col'>
                                <h5>Accepté par : ".$v->accept[0]->Nom."</h5>
                            </div>
                            <div class='col'>
                                <h5>Contact : ".$v->accept[0]->Tel."<br>".$v->accept[0]->Mail."</h5>
                            </div>";
                        }else{
                            echo "<div class='col'>
                                <h5>Non Accepté</h5>
                            </div>
                            <div class='col'>
                                <h5>Contact : </h5>
                            </div>";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>