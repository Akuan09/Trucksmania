
        <form action="http://localhost/" method="POST">

          <input type="hidden" name="page" value="<?=$page?>">
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
            <p class="small fw-bold mt-2 pt-1 mb-0">Pas de compte ? <a href="http://localhost/inscription/<?=explode(".",$page)[0]?>s" class="link-danger">Inscrivez-vous</a></p>
          </div>

        </form>