<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours</title>
    <link rel="stylesheet" href="../../public/css/index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
    <div class="informations-container">
        <div class="informations">
            <div class='contest-info'>
                <h1 class="title"><?php echo $contestTitle; ?></h1>
                <p class="title"><?php echo $contestDescription; ?></p>
            </div>

            <div class="links">
                <a href="inscription.php" class="inscription-button">Créer un compte</a>
                <a href="login.php" class="connection-button">Se connecter</a>
            </div>
        </div>
    </div>
    <div class="formations">
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

    <div class="choice-of-iai">
        <h1>Pourquoi nous choisir</h1>
        <div class="reasons">
            <div class="reason ex-acad">
                <h2>Excellence académique</h2>
                <p>Son équipe pédagogique est composée des enseignants expérimentés universitaires et des professionnels de l’informatique, d’un staff d’encadrement rigoureux et professionnel. Son programme de formation est régulièrement visité et mis à jour .</p>
            </div>


            <div class="reason stages">
                <h2>Projets et Stages Académiques</h2>
                <p>Après le volet des apprentissages dans des salles pour des cours théoriques & pratiques, les étudiants sont invités à l’insertion professionnelle dans des entreprises, des cabinets informatiques et autres structures tant publiques que privés pour y effectuer des stages au semestres 4 et 6.</p>
            </div>

            <div class="reason equip">
                <h2>Infrastructures et équipements de pointe
                </h2>
                <p>Son équipe pédagogique est composée des enseignants expérimentés universitaires et des professionnels de l’informatique, d’un staff d’encadrement rigoureux et professionnel. Son programme de formation est régulièrement visité et mis à jour .</p>
            </div>

            <div class="reason diplomes">
                <h2>Suivi des diplômés</h2>
                <p>Le réseau d’allumis de l’IAI-TOGO se compose essentiellement des diplômés éparpillés sur la planète (Inde, Chine, France, Canada, Etats-Unis, Bénin, Côte d’Ivoire, Burkina-Faso, Îles de Madagascar, …).</p>
            </div>
        </div>
    </div>

    <script src="../js/index.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>