<?php
session_start();

$id = $_SESSION["id"];
$admin_id = $_SESSION["admin_id"];
echo $id;
echo $admin_id;
echo $_SESSION["admin_name"];
