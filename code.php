<?php 
session_start();
require_once 'database.php';
require_once 'src/Sender.php';

if(isset($_POST['email']))
{
    $_SESSION['isvalid'];
    $email = $_POST['email'];
    $token = rand(0, 999999);
    $subject = "Validation test";

    $body = "Hi, you are validating your account, your token is ". $token;

    if(Message::setMessage($email, $subject, $token))
    {
        if($stmt = $database->setConnection()->query("UPDATE `account` SET `token`='$token' WHERE email = '" . $email ."'"))
        {
            echo 'success';
        }
        else
        {
            echo mysqli_error($database->setConnection());
        }
    }
    else
    {
        echo "update error";
    }
    
    

}

?>