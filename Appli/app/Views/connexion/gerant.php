
    <main>
        <div class="container mt-3">
            <div class="row">
                <h1 class="text-center">Se connecter</h1>
            </div>
            <div class="row mt-1">
                    <a href="http://localhost/connexion/client" class="p-0 col-xs-12 offset-md-3 col-md-3"><button class="col-12 btn btn-ligth">Client</button></a>
                    <button class="col-xs-12 col-md-3 btn btn-success text-light">Gérant</button>
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