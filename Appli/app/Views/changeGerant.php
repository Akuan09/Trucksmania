<?php
    $gerant = $gerant[0];
?>
    <main>
        <div class="container">
            <div class="row text-center mt-3 mb-5">
                <h1>Modifier les informations du gérant</h1>
            </div>
            <form action="http://localhost/admin" method='POST'>
                <input type="hidden" name="type" value='gerant'>
                <input type="hidden" name="id" value=<?=$gerant->id_gerant?>>
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" class='form-control mb-2' value=<?=$gerant->Nom?>>
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" class='form-control mb-2' value=<?=$gerant->Prenom?>>
                <label for="mail">Mail :</label>
                <input type="email" name="mail" class='form-control mb-2' value=<?=$gerant->Mail?>>
                <label for="tel">N° de téléphone :</label>
                <input type="tel" name="tel" class='form-control mb-2' value=<?=$gerant->Tel?>>
                <label for="adress">Adresse :</label>
                <input type="text" name="adress" class='form-control mb-2' value=<?=$gerant->Adresse?>>
                <input type="submit" value="Valider" class='btn btn-success'>
            </form>
        </div>
    </main>
</body>
</html>