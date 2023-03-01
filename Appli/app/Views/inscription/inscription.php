
            <div class="row">
                <form action="http://localhost/create" method="POST" class="mt-5">
                    <input type="hidden" name="page" value="<?=$page?>">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <input type="text" name="lastname" placeholder="Nom" class="form-control" required>
                        </div>
                        <div class="col-xs-12 col-md-6">
                        <input type="text" name="firstname" placeholder="Prénom" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xs-12 col-md-6">
                        <input type="email" name="mail" placeholder="Adresse e-mail" class="form-control" required>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <input type="tel" name="tel" placeholder="N° de téléphone" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-xs-12 col-md-6">
                            <input type="password" name="psw" placeholder="Mot de passe" class="form-control" required>
                        </div>
                        <div class="col-xs-12 col-md-6">
                        <input type="password" name="psw2" placeholder="Retaper le mot de passe" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <textarea name="adress" rows="3" placeholder="Adresse" class="form-control" required></textarea>
                        </div>
                    </div>
                    <?php
                        if ($page=="client"){
                            echo <<<HTML
                                <div class="row">
                                    <label for="pro">Client professionnels ?</label>
                                    <input type="checkbox" name="pro">
                                </div>
                            HTML;
                        }
                    ?>
                    <div class="row mt-1">
                        <div class="col">
                            <input type="submit" value="S'inscrire" class="btn btn-success btn-lg">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Déjà inscrit ? <a href="http://localhost/connexion/<?=$page?>" class="link-danger">Connectez-vous</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </main>
</body>
</html>