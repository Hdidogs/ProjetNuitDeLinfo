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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        function loadMessagesGeneral() {
            $('#messages').load('../php/canal/loadMessagesGeneral.php');
        }

        $(document).ready(function() {
            loadMessagesGeneral();
            setInterval(loadMessagesGeneral, 500);
        });
    </script></head>
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

    if (isset($_POST['envoyer'])) {
        if (!empty($_POST['message'])) {
            $messageInsert = $co->conbdd()->prepare("INSERT INTO message(libelle, ref_user, ref_canal) VALUES (:libelle, :ref_user, :ref_canal)");
            $messageInsert->execute(['libelle'=>$_POST['message'], 'ref_user'=>$id_user, 'ref_canal'=>"1"]);
        }
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


        <section id="messages"></section>

        <div class="d-flex align-items-center">

        </div>

        <footer>
            <div class="collapse navbar-collapse">
                <form method="post" action="">
                    <input type="text" name="message" style="text-align: center"><input type="submit" value="envoyer" name="envoyer" style="text-align: center">
                </form>
            </div>
        </footer>

        <script>
            setInterval('loadMessagesGeneral', 500);
            function loadMessagesGeneral() {
                $('#messages').load('../php/canal/loadMessagesGeneral.php');
            }
        </script>
    </div>
</body>
</html>