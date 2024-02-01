<head>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            } else {
                $('nav').removeClass('black');
            }
        })
        /*menu button onclick function*/
        $(document).ready(function() {
            $('.menu h4').click(function() {
                $("nav ul").toggleClass("active")
            })
        })
    </script>
</head>

<body>
    <div class="responsive-bar">
        <div class="logo">
            <img src="../images/custom_iai_logo.png" alt="logo" />
        </div>
        <div class="menu">
            <h4>Menu</h4>
        </div>
    </div>
    <nav>
        <div class="logo">
            <img src="../images/custom_iai_logo.png" alt="logo" />
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Se connecter</a></li>
            <li><a href="inscription.php">Créer un compte</a></li>
        </ul>
    </nav>
</body>