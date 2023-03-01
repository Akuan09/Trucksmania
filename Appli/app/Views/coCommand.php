
    <main>
        <?php
            $page = basename(__FILE__);
        ?>
        <div class="container mt-3">
            <div class="row">
                <h1 class="text-center">Se connecter</h1>
            </div>
            <div class="row">               
                <form action="http://localhost/validCommand" method="POST">
                    <div class="form-outline mb-4 mt-5 col-xs-12 offset-md-3 col-md-6">
                    <input type="email" name="mail" class="form-control form-control-lg" placeholder="Entrer votre adresse mail" required/>
                    <label class="form-label" for="mail">Adresse mail</label>
                    </div>

                    <div class="form-outline mb-3 col-xs-12 offset-md-3 col-md-6">
                    <input type="password" name="psw" class="form-control form-control-lg" placeholder="Entrez votre mot de passe" required/>
                    <label class="form-label" for="psw">Mot de passe</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2 col-xs-6 offset-md-5 col-md-2">
                    <input type="submit" value="Se connecter" class="btn btn-success btn-lg col-12">
                </div>
                <div class='text-center mt-5'>
                    <a href="http://localhost/validCommand" class='text-danger fw-bold h3'>Continuer sans compte ?</a>
                </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>