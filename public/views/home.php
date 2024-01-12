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
       $username = "";
   }

   $userId = $_SESSION["id"];
// echo $userId;
   ?>



<a href="login.php">
    <?php
    echo $username;
    session_destroy();
    ?>
</a>



<!-- <button>Consulter candidature</button> -->
<?php if (existsCandidat($userId)) { ?>
        <button>Postuler concours</button>
<?php } else { ?>
        <button>Consulter candidature</button>
<?php } ?>


</a>
</body>
</html>