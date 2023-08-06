<?php
session_start();
require_once 'bdd.php';
if(isset($_POST['mail']) and isset($_POST['password'])){
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $hasspass = hash('SHA1',$password);

    $selectQuery = "SELECT * FROM users WHERE mail= ? AND pass= ?";
    $stmtUser = $BDD->prepare($selectQuery);
    $stmtUser->execute(array($email, $hasspass));

    if($stmtUser-> rowCount()> 0 ){
        $data = $stmtUser->fetch();
        $_SESSION['mail'] = $data['mail'];
        header('location: main.php');
    }
    else{
        
        header('location: index.php');
        
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Valid email!
   }    


}

?>