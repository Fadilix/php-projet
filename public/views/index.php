<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours</title>
    <link rel="stylesheet" href="../../public/css/index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/number-css.css">
</head>

<style>
    .contest-info {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }


    .title {
        width: 800px;
        text-align: center;
    }
</style>

<body>

    <?php
    $contestTitle = "Bienvenue sur notre plateforme d'inscription au concours d'entrée d'IAI-TOGO";
    $contestDescription = "Transformez votre passion en expertise numérique avec l'École Informatique IAI Togo – Où l'innovation devient une réalité, et vos rêves informatiques prennent vie!";

    // include "../../public/components/navbar.php";
    ?>
    <?php include "../components/navbar.php" ?>
    <?php include "../../controllers/datesController.php"; ?>
    <div class="informations-container" id="home">
        <div class="informations">

            <script>
                <?php $candidDate = getCandidDate(); ?>
                // Get the PHP value and create a JavaScript Date object
                var candidDate = new Date("<?php echo $candidDate['date_lim_dep']; ?>");

                // Update the countdown every second
                var countdownInterval = setInterval(updateCountdown, 1000);

                function updateCountdown() {
                    var now = new Date();
                    var timeDifference = candidDate - now;

                    // Calculate days, hours, minutes, and seconds
                    var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                    // Display the countdown
                    document.getElementById("countdown").innerHTML = "Fin de dépôt de candidature dans : " +
                        "<span>" +
                        days + " jours " +
                        hours + " heures " +
                        minutes + " minutes " +
                        seconds + " secondes" +
                        "</span>";

                    // If the countdown is over, stop updating
                    if (timeDifference <= 0) {
                        clearInterval(countdownInterval);
                        document.getElementById("countdown").innerHTML = "Le délai de dépôt de candidature est expiré.";
                    }
                }
            </script>
            <div class='contest-info'>
                <h4 id="countdown">Fin de dépôt de candidature dans : Loading...</h4>

                <h1 class="title"><?php echo $contestTitle; ?></h1>
                <p class="title"><?php echo $contestDescription; ?></p>
            </div>

            <div class="links">
                <a href="inscription.php" class="inscription-button">Créer un compte</a>
                <a href="login.php" class="connection-button">Se connecter</a>
            </div>
        </div>
    </div>
    <div class="formations" id="formations">
        <h1 data-aos="fade-up" class="nos-formations">Nos formations</h1>
        <div class="parcourss">

            <div class="parcours glsi" data-aos="fade-right">
                <h1 class="h1">GLSI</h1>
                <p>
                    Le parcours GLSI à l'IAI Togo se concentre sur le développement de compétences avancées en génie logiciel et en conception de systèmes d'information. Les étudiants apprendront à concevoir, développer et maintenir des logiciels robustes, tout en acquérant une compréhension approfondie des systèmes d'information. Des cours pratiques et des projets concrets permettront aux étudiants de maîtriser les technologies modernes et les méthodologies de développement.
                </p>
            </div>

            <div class="parcours asr" data-aos="fade-in">
                <h1 class="h1">ASR</h1>
                <p>
                    Le parcours ASR prépare les étudiants à exceller dans le domaine de l'administration des systèmes et des réseaux informatiques. Les cours couvrent une variété de sujets, y compris la gestion des serveurs, la sécurité réseau, la configuration des systèmes, et la résolution des problèmes liés aux infrastructures informatiques. Les étudiants développeront des compétences pratiques essentielles pour maintenir des réseaux informatiques performants et sécurisés.
                </p>
            </div>

            <div class="parcours mtwi" data-aos="fade-left">
                <h1 class="h1">MTWI</h1>
                <p>
                    Le parcours MTWI à l'IAI Togo met l'accent sur la création et la gestion de contenus multimédias. Les étudiants apprendront les aspects techniques de la production multimédia, y compris la conception graphique, la production vidéo, l'animation et le développement web interactif. Ce parcours offre une combinaison unique de compétences techniques et créatives pour préparer les étudiants à exceller dans l'industrie dynamique du multimédia.
                </p>
            </div>
        </div>

    </div>

    <div class="choice-of-iai" id="choice">
        <h1 data-aos="fade-up">Pourquoi nous choisir ?</h1>
        <div class="left-and-right">

            <div class="left" data-aos="fade-right">
                <img src="../images/cs_class.jpg" alt="">
            </div>
            <div class="reasons">
                <div class="reason ex-acad" data-aos="fade-in">
                    <div class="tick">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>

                        <h2> Excellence académique</h2>
                    </div>
                    <p>Son équipe pédagogique est composée des enseignants expérimentés universitaires et des professionnels de l’informatique, d’un staff d’encadrement rigoureux et professionnel. Son programme de formation est régulièrement visité et mis à jour .</p>
                </div>


                <div class="reason stages" data-aos="fade-in">
                    <div class="tick">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>

                        <h2>Projets et Stages Académiques</h2>
                    </div>
                    <p>Après le volet des apprentissages dans des salles pour des cours théoriques & pratiques, les étudiants sont invités à l’insertion professionnelle dans des entreprises, des cabinets informatiques et autres structures tant publiques que privés pour y effectuer des stages au semestres 4 et 6.</p>
                </div>

                <div class="reason equip" data-aos="fade-in">
                    <div class="tick">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>

                        <h2>Infrastructures et équipements de pointe
                    </div>
                    </h2>
                    <p>Son équipe pédagogique est composée des enseignants expérimentés universitaires et des professionnels de l’informatique, d’un staff d’encadrement rigoureux et professionnel. Son programme de formation est régulièrement visité et mis à jour .</p>
                </div>

                <div class="reason diplomes" data-aos="fade-in">
                    <div class="tick">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                        </svg>

                        <h2>Suivi des diplômés</h2>
                    </div>
                    <p>Le réseau d’allumis de l’IAI-TOGO se compose essentiellement des diplômés éparpillés sur la planète (Inde, Chine, France, Canada, Etats-Unis, Bénin, Côte d’Ivoire, Burkina-Faso, Îles de Madagascar, …).</p>
                </div>
            </div>
        </div>
    </div>

    <div class="graduation" data-aos="fade-right">
        <h1 data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="4000">L'excellence à IAI-TOGO</h1>
    </div>


    <!-- A propos -->

    <div class="a-propos" data-aos="fade-left">
        <h1 data-aos="fade-up">L'IAI-TOGO en quelques chiffres</h1>
        <div class="card-container">

            <div class="card">
                <h1>+900</h1>
                <p>diplômés</p>
            </div>

            <div class="vertical-line"></div>

            <div class="card">
                <h1>+3</h1>
                <p>filieres en informatique</p>
            </div>

            <div class="vertical-line"></div>

            <div class="card">
                <h1>+89</h1>
                <p>Enseignants</p>
            </div>
        </div>
    </div>

    <div class="a-propos" data-aos="fade-right">
        <div class="card-container">

            <div class="card">
                <h1>+400</h1>
                <p>internationaux</p>
            </div>

            <div class="vertical-line"></div>

            <div class="card">
                <div class="stats">
                    <p>+</p>
                    <div id="example" data-max-number="10">0</div>
                </div>
                <p>Certificats internationaux</p>
            </div>
    
            <div class="vertical-line"></div>

            <div class="card">
                <h1>+6</h1>
                <p>Enseignants internationaux</p>
            </div>
        </div>
    </div>

    <div data-aos="slide-up" id="contact-us">
        <?php include "../components/footer.php" ?>
    </div>
    <script src="../js/number-rush.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>