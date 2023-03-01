
<main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Valider la commande</h1>
            </div>
            <div class="row mt-3">
                <a href="http://localhost/commandDomicile" class="p-0 col-xs-12 offset-md-3 col-md-3"><button class="col-12 btn btn-light btn-lg">Livraison à domicile</button></a>
                <button class="col-xs-12 col-md-3 btn btn-success btn-lg text-light">Récupérer sur place</button>
            </div>
            <div class="row mt-4">
                    <button class="col-xs-12 offset-md-3 col-md-3 btn btn-success btn-lg text-light">Payer en ligne</button>
                    <a href="http://localhost/commandPlace2" class="p-0 col-xs-12 col-md-3"><button class="col-12 btn btn-light btn-lg">Payer sur place</button></a>
            </div>
            <div class="row mt-3">
                <form action="http://localhost/command" method='POST'>
                    <input type="hidden" name="typeCommand" value='Sur place'>
                    <div class='border border-dark mt-3 p-2 rounded'>
                        <label for="numCB">Numéro de Carte Bleue</label>
                        <input type="text" name="numCB" class='form-control' required>
                        <div class='row'>
                            <div class="col-3">
                                <label for="expiration">Date d'expiration</label>
                                <input type="text" name="expiration" class="form-control" required>
                            </div>
                            <div class="col-3">
                                <label for="crypto">Cryptogramme</label>
                                <input type="text" name="crypto" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Commander" class='btn btn-success btn-lg mt-2'>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
</html>