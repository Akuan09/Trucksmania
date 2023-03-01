<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Trucksmania</title>
</head>
<body>
    <?php
        if (session_status()==1){
            session_start();
        }
    ?>
    <nav class="navbar bg-light d-flex justify-content-space-between gradient">
            <img src="http://localhost/images/logo.jpg" class="ms-3 border" width="90" height="70" alt="Logo">
            <div class="d-flex align-items-center">
                <?php
                    if (isset($_SESSION["role"]) && $_SESSION["role"]==0){
                        echo <<<HTML
                            <div class="me-3 p-3"><h4><a href="http://localhost/gestiontruck" class="text-light text-decoration-none">Gérer ses <br>food-trucks</a></h4></div>
                        HTML;
                    }else{
                        echo <<<HTML
                            <div class="me-4 p-3"><h4><a href="http://localhost/" class="text-light text-decoration-none">Accueil</a></h4></div>
                            <div class="me-4"><h4><a href="http://localhost/findtruck" class="text-light text-decoration-none">Trouver un <br> food-truck</a></h4></div>
                        HTML;
                    }
                    if(isset($_SESSION["lastname"])){
                        if ($_SESSION["role"]==25 || $_SESSION["role"]==0 || $_SESSION["role"]==1){
                            echo "<div class='me-4'><h4><a href='http://localhost/event' class='text-light text-decoration-none'>Evènements</a></h4></div>";
                        }
                        if ($_SESSION["role"]==1){
                            echo <<<HTML
                                <div class="me-3 p-3"><h4><a href="http://localhost/admin" class="text-light text-decoration-none">Page Admin</a></h4></div>
                            HTML;
                        }
                        echo "<div class='me-4'><h4><a href='http://localhost/infos-personnelles' class='text-light text-decoration-none'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</a></h4></div>";
                        echo "<a href='http://localhost/logout'><button class='btn btn-success me-4'>Se déconnecter</button></a>";
                    }else{
                        echo <<<HTML
                            <div class="me-4"><h4><a href="http://localhost/connexion/client" class="text-light text-decoration-none">Connexion</a></h4></div>
                            <div class="me-4"><h4><a href="http://localhost/inscription" class="text-light text-decoration-none">Inscription</a></h4></div>
                        HTML;
                    }
                ?>
                
            </div>
        </nav>