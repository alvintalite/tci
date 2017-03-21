<?php
include('../database.php');
$tbl_name="account"; 

session_start();
{
    $user=$_POST['email'];
    $pass=$_POST['password'];
    $pdo = Database::connect();
    $query = $pdo->prepare("SELECT user_id FROM account WHERE 
                         user_name='$user' and user_pass='$pass'");
    $query->execute();
    $count = $query->fetch(PDO::FETCH_ASSOC);
    if($count!="")
    {
        $_SESSION['login_username']=$user;
        header("Location:../header.php"); 
    }
    else
    {
       header('Location:../login.php');
       
    }
}
?>