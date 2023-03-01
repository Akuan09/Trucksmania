
    <main>
        <div class="container mt-3">
            <div class="row">
                <h1 class="text-center">Se connecter</h1>
            </div>
            <div class="row mt-1">
                    <button class="col-xs-12 offset-md-3 col-md-3 btn btn-success text-light">Client</button>
                    <a href="http://localhost/connexion/gerant" class="p-0 col-xs-12 col-md-3"><button class="col-12 btn btn-light">Gérant</button></a>
            </div>
            <div class="row">
                <?php 
                    $page = basename(__FILE__);
                    include('connexion.php');
                ?>
            </div>
        </div>
    </main>
</body>
</html>