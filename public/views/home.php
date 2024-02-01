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
    include "../../controllers/datesController.php";
    session_start();
    ?>


    <?php 
    
    // can only access this page if he's is logged in
    if((string) $_SESSION["id"] == "0"){
        header("Location: login.php");
    }
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
                <?php
                $dateCandidature = new DateTime(getCandidDate()["date_lim_dep"]);
                $now = new DateTime();

                $interval = $dateCandidature->diff($now);

                // différence entre les dates
                $canPostulate = $interval->invert > 0;
                // echo $canPostulate ? "you can" : "you cannot";
                ?>

                <p><?php echo $canPostulate ? "Cliquez sur le bouton ci-dessous pour postuler au concours" : "La date de dépôt de candidature est expiré, vous ne pouvez plus postuler"?></p>
                <button style="z-index: <?php echo $canPostulate ? "" : "-2" ?>">
                    <a href="postuler.php">Postuler concours</a>
                </button>
            </div>
        <?php } ?>
    </div>


    </a>
</body>

</html>