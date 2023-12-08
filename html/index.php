<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">

        <title>Eco Link</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
        <link rel="stylesheet" href="../css/styles.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

        <!-- JavaScripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

        <link href="../assets/index.css" rel= "stylesheet">

    </head>
    <body>
    <?php
        include '../php/SQLHelper.php';
        $co = new SQLHelper();
        session_start();
        $id_user=$_SESSION['id_user'];
        ?>
    <div class=" container-fluid bg-success hero-header mb-5">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <nav class="navbar fixed-top bg-white p-2 rounded-3 mx-0 shadow w-220px">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active "><i class="fa-regular fa-comment"></i> Chat</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa-solid fa-gamepad"></i> Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fa-regular fa-clipboard"></i> Leaderboard</a>
                        </li>
                    </ul>

                    <?php
                    if (!(isset($_SESSION['id_user'])) || isset($_SESSION['id_user']) <= 0) {
                        ?>
                        <div class="col-md-3 text-end">
                            <a role="button" class="btn btn-outline-primary me-2" href="inscription.php">Inscription</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connexion">Connexion</button>
                        </div>
                    <?php }
                    ?>

                    <?php
                    if (isset($_SESSION['id_user']) ) {
                        ?>
                        <div class="flex-shrink-0 dropdown" style="margin-right: 80px;">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img height="32" width="32" src="../assets/user.png" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small shadow" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 34px, 0px);" data-popper-placement="bottom-end">
                                <li>
                                    <a href="#" class="dropdown-item">Mes statistiques</a>
                                </li>
                                <?php
                                if ($co->checkAdmin($id_user)) {
                                    ?>
                                    <li>
                                        <a href="PanelAdmin.php" class="dropdown-item">Panel Administration</a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </nav>
            </header>

            <br>
            <br>
            <?php $compteur = 100 ; ?>
            <!-- Section 1: Rectangle qui prend toute la longueur -->
            <div class="bg-white text-dark p-5 text-center rounded-3 shadow">
                <div class="d-flex align-items-center">

                        <figure class="d-flex justify-content-start">
                            <img class="img" src="../assets/ARBRE2.jpg" alt="" >
                        </figure>


                        <h1 class="d-flex justify-content-center compteur"><?=$compteur?> </h1>
            </div>
                <h1 class = grace > Grace à vous ! </h1>
                <br>
                <br>
                <button type="button" class="btn btn-outline-success">Donation</button>
            </div>

            <!-- Section 2: Deux carrés collés -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 bg-white text-dark p-4 rounded-3 shadow">
                        <h2>A Propos</h2>
                        <p>Contenu du premier carré de la deuxième section.</p>
                        <a type="button" class="btn btn-outline-success" href="apropos.html">En savoir plus</a>
                    </div>
                    <div class="col-md-6 bg-dark text-white p-4 rounded-3 shadow">
                        <h2>Donation</h2>
                        <p>Contenu du deuxième carré de la deuxième section.</p>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <!-- Section 3: Un seul carré -->
            <div class="bg-white text-dark p-5 text-center rounded-3 shadow">
                <h1>Quizz</h1>
                <p>Contenu de la troisième section avec un seul carré.</p>
                <a type="button" class="btn btn-outline-success" href="quizz.html">Allez au quizz</a>
            </div>

            <br>
            <br>
        </div>
    </div>

        <!-- Modals --->

        <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexion" aria-hidden="true">
            <form action="../php/connexion.php" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Connexion</h5>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal_body">
                            <main class="form-signin w-100 m-auto">
                                <div class="form-floating">
                                    <input class="form-control" type="email" id="floatingInput" name="mail" placeholder="Adresse Mail" required>
                                    <label for="floatingInput"><i class="fa-regular fa-envelope"></i> Adresse Mail</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" type="password" id="floatingInput" name="mdp" placeholder="Mot de Passe" required>
                                    <label for="floatingInput"><i class="fa-solid fa-key"></i> Mot de Passe</label>
                                </div>
                            </main>
                        </div>
                        <div class="modal_footer">
                            <a href="../php/inscription.php" class="btn btn-outline-primary" role="button" aria-disabled="true">Crée un compte</a>
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Réinitialiser</button>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
