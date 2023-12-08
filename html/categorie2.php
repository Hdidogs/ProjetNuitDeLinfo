<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ecolink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
    <link rel="stylesheet" href="../css/style.css"/>
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
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
<?php
include '../php/SQLHelper.php';
$co = new SQLHelper();
?>
<div class="container text-center">
    <h2 class="display-4 text-white mb-3 animated slideInDown">Categories : Tris selectif</h2>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" src="../assets/d.png">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">

                <?php
                $bdd = $co->conbdd();
                $req = $bdd->prepare("SELECT * FROM reponse INNER JOIN question ON reponse.ref_question = question.id_question WHERE ref_quizz = 2 ");
                $req->execute();
                $result = $req->fetchAll( PDO::FETCH_ASSOC);
                //var_dump($result);
                $questions = [];
                foreach ($result as $item){
                    if (array_key_exists($item["id_question"],$questions)){
                        $questions[$item["id_question"]]["reponses"][$item["id_reponse"]] = $item["reponse"];
                    }else{
                        $questions[$item["id_question"]] = [
                            "question" => $item["question"],
                            "reponses" => [
                                $item["id_reponse"] => $item["reponse"]
                            ]
                        ];
                    }
                }
                //var_dump($questions);
                foreach ($questions as $res) {?>

                    <h1 class="text-primary mb-4">    <?php   echo $res['question'];  ?> </h1>



                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <?php

                        foreach ($res["reponses"] as $reponse){ ?>
                            <label class="options">
                                <input type="checkbox" name="bouton1">
                                <?= $reponse;  ?> </h1>
                                <span class="checkmark"></span>
                            </label><br>
                        <?php } ?>
                    </div>
                    <input type="submit" value="Envoyer" name="envoyer" class="envoyer">

                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- About End -->


</body>
</html>
