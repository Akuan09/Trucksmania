
    <main>
        <div class="container">
            <div class="row text-center mt-3">
                <h1>Proposer un évènement</h1>
            </div>
            <div class="row">
                <a href="http://localhost/eventPerso" class='btn btn-success'>Mes propositions</a>
            </div>
            <div class="row mt-3 text-center">
                <form action="http://localhost/eventP" method='POST'>
                    <input type="text" name="lieu" class="form-control mb-4" placeholder="Lieu de l'évènement" required>
                    <input type="date" name="date" class="form-control mb-4" required>
                    <input type="number" name="duree" class="form-control mb-4" placeholder="Durée de l'évènement (en jours)" required>
                    <input type="number" name="nbClient" class="form-control mb-4" placeholder='Estimation du nombre de clients' required>
                    <input type="submit" value="Proposer l'évènement" class='btn btn-success btn-lg mt-3'>
                </form>
            </div>
        </div>
    </main>
</body>
</html>