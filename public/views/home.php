<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   include "../../controllers/candidatController.php";
   session_start();


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



   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $submit = $_POST["submit"];

       if (isset($submit)) {
           session_destroy();
           header("Location: index.php");
       }
   }
   ?>


<form action="" method="POST">

    <button type="submit" name="submit">
        <?php
        echo $username;
        ?>
</button>
</form>



<!-- <button>Consulter candidature</button> -->
<?php if (existsCandidat($userId)) { ?>
        <button>
            <a href="consulter.php">Consulter candidature</a>
        </button>
    <?php } else { ?>
        <button>
            <a href="postuler.php">Postuler concours</a>
        </button>
<?php } ?>


</a>
</body>
</html>