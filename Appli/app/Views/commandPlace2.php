
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
                <a href="http://localhost/commandPlace" class="p-0 col-xs-12 offset-md-3 col-md-3"><button class="col-12 btn btn-light btn-lg">Payer en ligne</button></a>
                <button class="col-xs-12 col-md-3 btn btn-success btn-lg text-light">Payer sur place</button>
            </div>
            <div class="row mt-3 text-center">
                <form action="http://localhost/command" method='POST'>
                    <input type="hidden" name="typeCommand" value='Sur place'>
                    <input type="submit" value="Commander" class='btn btn-success btn-lg mt-2'>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
</html>