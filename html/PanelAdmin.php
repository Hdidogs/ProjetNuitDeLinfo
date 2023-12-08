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
</head>
<body>
    <?php
    include '../php/SQLHelper.php';
    $co = new SQLHelper();

    session_start();
    if (isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
    } else {
        $id_user = 0;
    }
    ?>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <nav class="navbar fixed-top bg-white p-2 rounded-3 mx-0 shadow w-220px">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="index.php#mettrelogo" class="d-block link-body-emphasis text-decoration-none" style="margin-right: 20px; margin-left: 15px">
                            <img height="40" width="40" src="../assets/logo.png" class="rounded-circle">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Chat.php" class="nav-link active "><i class="fa-regular fa-comment"></i> Chat</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fa-solid fa-gamepad"></i> Jeux</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fa-regular fa-clipboard"></i> Leaderboard</a>
                    </li>
                </ul>
                <?php if($id_user==0){
                    ?>
                    <div class="col-md-3 text-end">
                        <a role="button" class="btn btn-outline-primary me-2" href="inscription.php">Inscription</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#connexion">Connexion</button>
                    </div>

                <?php } else {
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
                                <a href="../php/deconnection.php" class="dropdown-item">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </nav>
        </header>

        <br>
        <hr class="featurette-divider">
        <br>

        <!-- Section statistiques -->
        <section id="statistics" class="mt-3">
                <h2 style="text-align: center">Statistiques</h2>

            <!-- Ajouter des éléments pour afficher les statistiques spécifiques à votre application -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nombre d'arbres plantés</h5>
                            <p class="card-text"><?php
                                $res = $co->conbdd()->query("SELECT * FROM arbre");
                                $arbre = $res -> fetchAll();
                                $total = 0;

                                foreach ($arbre as $un_arbre) {
                                    $nbr_arbre = $un_arbre['nbr'];
                                    $total = $total + $nbr_arbre;
                                }

                                echo $total;
                            ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Argent récolté</h5>
                            <p class="card-text"><?php
                                $res = $co->conbdd()->query("SELECT * FROM transac");
                                $transac = $res -> fetchAll();
                                $total = 0;

                                foreach ($transac as $une_transac) {
                                    $montant = $une_transac['montant'];
                                    $total = $total + $montant;
                                }

                                echo $total." €";
                                ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nombre de participant</h5>
                            <p class="card-text"><?php
                                $res = $co->conbdd()->query("SELECT DISTINCT ref_user FROM arbre");
                                $arbre = $res -> fetchAll();
                                $total = 0;

                                foreach ($arbre as $un_arbre) {
                                    $total = $total + 1;
                                }

                                echo $total;
                                ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Moyenne de don</h5>
                            <p class="card-text"><?php
                                $res = $co->conbdd()->query("SELECT * FROM transac");
                                $transac = $res -> fetchAll();
                                $totalMontant = 0;

                                foreach ($transac as $une_transac) {
                                    $montant = $une_transac['montant'];
                                    $totalMontant = $totalMontant + $montant;
                                }

                                $res = $co->conbdd()->query("SELECT DISTINCT ref_user FROM arbre");
                                $arbre = $res -> fetchAll();
                                $totalUser = 0;

                                foreach ($arbre as $un_arbre) {
                                    $totalUser = $totalUser + 1;
                                }

                                $total = $totalMontant/$totalUser;

                                echo $total." €";
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <hr class="featurette-divider">
        <br>

        <!-- Section Quizz -->
        <section id="quizz" class="mt-3">
            <h2 style="text-align: center">Quizz</h2>

            <!-- Ajouter des éléments pour afficher les statistiques spécifiques à votre application -->
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quizz</h5>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newquizz">Créer un nouveau Quizz</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#supprquizz">Supprimer un Quizz</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Argent récolté</h5>
                            <p class="card-text">$10,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Argent récolté</h5>
                            <p class="card-text">$10,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <hr class="featurette-divider">
        <br>

        <!-- Section Chat -->
        <section id="chat" class="mt-3">
            <h2 style="text-align: center">Chat</h2>

            <!-- Ajouter des éléments pour afficher les statistiques spécifiques à votre application -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Canaux</h5>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newcanal">Ajouter un canal</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#supprcanal">Supprimer un canal</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <a href="inscription.php" class="btn btn-outline-primary" role="button" aria-disabled="true">Crée un compte</a>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Réinitialiser</button>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="newquizz" tabindex="-1" aria-labelledby="newquizz" aria-hidden="true">
        <form action="../php/quizz.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un Quizz</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <main class="form-signin w-100 m-auto">
                            <div class="form-floating">
                                <input class="form-control" type="text" id="floatingInput" name="theme" placeholder="Thème" required>
                                <label for="floatingInput"><i class="fa-solid fa-magnifying-glass"></i> Thème</label>
                            </div>
                        </main>
                    </div>
                    <div class="modal_footer">
                        <a href="inscription.php" class="btn btn-outline-primary" role="button" aria-disabled="true">Crée un compte</a>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Réinitialiser</button>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="newcanal" tabindex="-1" aria-labelledby="newcanal" aria-hidden="true">
        <form action="../php/canal/addCanal.php" method="get">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un Canal</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <main class="form-signin w-100 m-auto">
                            <div class="form-floating">
                                <input class="form-control" type="text" id="floatingInput" name="nom" placeholder="Nom" required>
                                <label for="floatingInput"><i class="fa-solid fa-pen"></i> Nom</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="text" id="floatingInput" name="theme" placeholder="Thème" required>
                                <label for="floatingInput"><i class="fa-solid fa-magnifying-glass"></i> Thème</label>
                            </div>
                        </main>
                    </div>
                    <div class="modal_footer" style="text-align: right; margin: 15px">
                        <button type="reset" class="btn btn-outline-primary" data-dismiss="modal">Réinitialiser</button>
                        <button type="submit" class="btn btn-success">Crée le canal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="supprcanal" tabindex="-1" aria-labelledby="supprcanal" aria-hidden="true">
        <form action="../php/canal/deleteCanal.php" method="get">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Supprimer un Canal</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <main class="form-signin w-100 m-auto" style="text-align: center; margin: 15px">
                            <select class="form-select" name="id">
                                <?php
                                    $canal = $co->conbdd()->query("SELECT * FROM canal");

                                    foreach ($canal as $un_canal) { ?>
                                        <option value="<?= $un_canal['id_canal'] ?>"> <?= "[".$un_canal['id_canal']."]". " " .$un_canal['nom'] ?> </option>
                                    <?php }
                                ?>
                            </select>
                        </main>
                    </div>
                    <div class="modal_footer" style="text-align: right; margin: 15px">
                        <button type="reset" class="btn btn-outline-primary" data-dismiss="modal">Réinitialiser</button>
                        <button type="submit" class="btn btn-danger">Supprimer le canal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
