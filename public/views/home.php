<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <?php
    include "../../controllers/candidatController.php";
    session_start();



    ?>



    <?php include "../components/candidateNav.php" ?>
    <div class="main">

        <!-- <button>Consulter candidature</button> -->
        <?php if (existsCandidat($userId)) { ?>
            <div class="post-const">
                <p>Cliquez sur le bouton ci-dessous pour consulter votre candidature</p>
                <button>
                    <a href="consulter.php">Consulter candidature</a>
                </button>
            </div>
        <?php } else { ?>
            <div class="post-const">
                <p>Cliquez sur le bouton ci-dessous pour postuler au concours</p>
                <button>
                    <a href="postuler.php">Postuler concours</a>
                </button>
            </div>
        <?php } ?>
    </div>


    </a>
</body>

</html>