<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Login</title>
</head>
<body>
    <script src="register.js"></script>
</body>
</html>
<?php
    include "Model/DBconfig.php";
    include "Model/Register/register.php";
    $db = new Database();
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];

    }else{
        $controller = '';
    }
    switch($controller){
        case 'register' : {
            require_once('Controller/Register/index.php');
        }
        case 'login':{
            require_once('Controller/Login/index.php');
        }

    }
?>