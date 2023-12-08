<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ecolink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
    <link rel="stylesheet" href="cssClassement.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container text-center">
    <h1 class="display-4 text-white mb-3 animated slideInDown">Classement Best Donate</h1>
    <h1 class="display-4 text-white mb-3 animated slideInDown"><br></h1>

    <h1 class="display-4 text-white mb-3 animated slideInDown"><table style="width: 100%">
            <tr> <td>Rang</td><td>Nom</td><td>Prenom</td><td>Badge</td><td>Arbre Plantés</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#1</td><td><?php
                    $bdd = new PDO('mysql:host=localhost;dbname=rmg_ecolink;charset=utf8', 'root', '');

                    $reponse = $bdd->query('SELECT * FROM user') ;

                    $donne = $reponse->fetch();

                    echo $donne['nom'];

                    $reponse->closeCursor() ;
                    ?></td><td><?php echo $donne['prenom']; ?></td><td><?php echo $donne['']; ?></td></tr>
            <tr><td><br></td></tr>
            <tr><td>#2</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#3</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#4</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#5</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#6</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#7</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#8</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#9</td></tr>
            <tr><td><br></td></tr>
            <tr><td>#10</td></tr>
        </table></h1>
</div>
</div>
</figure>
</div>


</body>
</html>

