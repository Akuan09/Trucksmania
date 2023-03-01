<?php
    $user = $user[0];
?>
    <main>
        <div class="container">
            <div class="row text-center mt-3 mb-5">
                <h1>Modifier les informations de l'utilisateurs</h1>
            </div>
            <form action="http://localhost/admin" method='POST'>
                <input type="hidden" name="type" value='user'>
                <input type="hidden" name="id" value=<?=$user->id_user?>>
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" class='form-control mb-2' value=<?=$user->Nom?>>
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" class='form-control mb-2' value=<?=$user->Prenom?>>
                <label for="mail">Mail :</label>
                <input type="email" name="mail" class='form-control mb-2' value=<?=$user->Mail?>>
                <label for="tel">N° de téléphone :</label>
                <input type="tel" name="tel" class='form-control mb-2' value=<?=$user->Tel?>>
                <label for="adress">Adresse :</label>
                <input type="text" name="adress" class='form-control mb-2' value=<?=$user->Adresse?>>
                <label for="role">Role :</label>
                <select name='role' class='form-control mb-4'>
                    <option value="<?=$user->id_role?>"><?=$user->Role?></option>
                    <?php
                    foreach ($roles as $k => $v){
                        if ($v->id_role != $user->id_role){
                            echo "<option value=$v->id_role>$v->Nom</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Valider" class='btn btn-success'>
            </form>
        </div>
    </main>
</body>
</html>