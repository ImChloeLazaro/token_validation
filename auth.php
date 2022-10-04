<?php 
require_once 'database.php';

if(isset($_POST['validate']))
{
    $user_email = $_POST['email'];
    $user_token = $_POST['token'];

    $tokens = $database->setConnection()->query("SELECT * FROM `account` WHERE email = '".$user_email."'");
    $token = $tokens->fetch_assoc();

    if($token['token'] == $user_token)
    {
        echo "correct token";
    }
    else
    {
        echo "wrong token";
        
    }

    $database->setConnection()->query("UPDATE `account` SET `token`='0' WHERE email = '" . $user_email ."'");
    
}

?>