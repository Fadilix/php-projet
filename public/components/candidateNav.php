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

    <style>
        nav ul {
            list-style: none;
            display: flex;
            /* Add this */
            justify-content: space-between;
            /* Add this */
            align-items: center;
            /* Optional: Align items vertically */
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li button {
            padding: 10px;
            background-color: transparent;
            border: none;
            color: white;
            cursor: pointer;
            transition: .3s all ease;
            font-size: 20px;

            &:hover {
                scale: 1.08;
            }
        }
    </style>
</head>

<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $submit = $_POST["submit"];

        if (isset($submit)) {
            session_destroy();
            header("Location: index.php");
        }
    }

    if (isset($_SESSION["username"])) {
        $username = $_SESSION['username'];
    } else {
        $username = "no username";
    }

    if (isset($_SESSION["id"])) {
        $userId = $_SESSION['id'];
    } else {
        $userId = -1;
    }
    ?>
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
            <li><a href="index.php">HOME</a></li>
            <li style="margin-left: 0 auto;">
                <form action="" method="POST">

                    <button type="submit" name="submit">
                        <?php
                        echo $username;
                        ?>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</body>