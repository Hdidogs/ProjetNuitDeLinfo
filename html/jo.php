<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ecolink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
    <link rel="stylesheet" href="css/style.css"/>
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
    <link href="../css/jo.css" rel="stylesheet">
    <style>
        #puzzle-container {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            grid-gap: 5px;
        }

        .puzzle-piece {
            width: 100px;
            height: 100px;
            background: url("../assets/Paris-2024.webp");
            background-size: 1600px 900px; /* Taille de l'image */
            background-repeat: no-repeat;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>

<body>

<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->



<!-- Hero Start -->
<div class="container-fluid bg-primary hero-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Puzzle</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Acceuil</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Puzzle</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->

<div id="puzzle-container"></div>

<script>
    // Fonction pour mélanger le puzzle
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    // Fonction pour créer le puzzle
    function createPuzzle() {
        const container = document.getElementById("puzzle-container");
        const pieces = [];

        // Créer les pièces du puzzle
        for (let i = 0; i < 8; i++) {
            const piece = document.createElement("div");
            piece.className = "puzzle-piece";
            piece.style.backgroundImage = "url('votre_image.jpg')"; // Remplacez par le chemin de votre image
            pieces.push(piece);
        }

        // Ajouter la pièce vide
        const emptyPiece = document.createElement("div");
        emptyPiece.className = "puzzle-piece";
        emptyPiece.style.backgroundColor = "transparent";
        pieces.push(emptyPiece);

        // Ajouter les pièces au conteneur
        shuffleArray(pieces);
        pieces.forEach(piece => container.appendChild(piece));

        // Ajouter un gestionnaire d'événements aux pièces du puzzle
        pieces.forEach(piece => {
            piece.addEventListener("click", () => {
                if (isAdjacent(piece, emptyPiece)) {
                    // Échanger les positions des pièces
                    const temp = piece.style.backgroundImage;
                    piece.style.backgroundImage = emptyPiece.style.backgroundImage;
                    emptyPiece.style.backgroundImage = temp;
                }
            });
        });
    }

    // Vérifier si deux pièces sont adjacentes
    function isAdjacent(piece1, piece2) {
        const index1 = Array.from(piece1.parentElement.children).indexOf(piece1);
        const index2 = Array.from(piece2.parentElement.children).indexOf(piece2);

        return Math.abs(index1 - index2) === 1 || Math.abs(index1 - index2) === 3;
    }

    // Appeler la fonction pour créer le puzzle
    createPuzzle();
</script>




<!-- Feature End -->





<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>
</body>

</html>