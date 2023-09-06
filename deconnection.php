<?php
require_once("bdd.php");
session_start();
session_destroy();
header("location: index.php");
?>