
<?php
    // var_dump($carte);
    // var_dump($id_ft);
?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-8 mt-5">
                    <?php
                    foreach($carte as $k=>$v){
                        echo "<div class='offset-md-1 col-md-4 border border-success mb-2 mt-4'><h2>".strtoupper($k)."</h2></div>";
                        foreach ($v as $key=>$value){
                            echo "
                            <div class='border border-danger mb-1 p-1 d-flex justify-content-between align-items-center'>
                            <h3>$key</h3>
                            <h5>$value</h5>
                            <button class='btn btn-success addP' id=$key data-label='$value'>Ajouter au panier</button>
                            </div>";
                        }
                    }
                    ?>
            </div>
            <div class="col-xs-12 col-md-4 border border-danger mt-5">
                <h1 class='text-center'>Panier</h1><hr>
                <h3>Commande :</h3>
                <div id='panier'>
                    
                </div>
                <div class='border border-success p-1 d-flex justify-content-between align-items-center mt-5'>
                    <h4>Total</h4>
                    <h4 id='total'>€</h4>
                </div>
                <hr>
                <div class='text-center'>
                    <form action="http://localhost/coCommand" method='POST'>
                        <input type="hidden" name="id_ft" value=<?=$id_ft?>>
                        <input type="submit" value="Commander" class='btn btn-success btn-lg mb-3'>
                    </form>
                    <!-- <a href=''><button class='btn btn-success btn-lg mb-3'>Commander</button></a> -->
                </div>
                    
            </div>
        </div>
    </div>
    </main>
    <script src='http://localhost/js/main.js'></script>
</body>
</html>