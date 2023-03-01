
    <main>
        <div class="container text-center">
            <div class="row">
                <h1>Créer un compte gérant</h1>
            </div>
            <?php
                $page = basename(__FILE__);
                $page = explode(".",$page)[0];
                $page = substr($page,0,strlen($page)-1);
                include('inscription.php');
            ?>