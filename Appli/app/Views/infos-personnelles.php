
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Infos Personnelles</h1><hr>
            </div>
            <form action="http://localhost/modif" method='POST'>
                <div class="row mt-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="firstname">Prénom :</label>
                            <input type="text" name="firstname" value=<?=$_SESSION['firstname']?> required>
                        </li>
                        <li class="list-group-item">
                            <label for="firstname">Nom :</label>
                            <input type="text" name="lastname" value=<?=$_SESSION['lastname']?> required>
                        </li>
                        <li class="list-group-item">
                            <label for="firstname">Mail :</label>
                            <input type="email" name="mail" value=<?=$_SESSION['mail']?> required>
                        </li>
                        <li class="list-group-item">
                            <label for="firstname">N° de téléphone :</label>
                            <input type="tel" name="tel" value=<?=$_SESSION['tel']?> required>
                        </li>
                        <li class="list-group-item">
                            <label for="firstname">Adresse :</label>
                            <input type="text" name="adress" value=<?=$_SESSION['adress']?> required>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <input type="submit" value="Modifier" class='btn btn-success btn-lg mt-3'>
                </div>
            </form>
        </div>
    </main>
</body>
</html>