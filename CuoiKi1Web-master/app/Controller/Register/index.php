<?php
require('View/Message/message.php');
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = '';
    }
    $success = array();

    switch ($action) {
        case 'add_user':
            if(isset($_POST['add_account'])){
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $re_pass = $_POST['re_password'];
                $captcha = $_POST['captcha'];
                if (empty($user) || empty($pass) || empty($re_pass)) {
                    error('empty_fields');
                } else {
                    if (checkPass($pass, $re_pass)) {
                        $db->Insert($user, $pass);
                        $success[] = 'add_success';
                        echo success('add_user_success');
                        exit;                       
                    } else {
                        error('password_mismatch');
                    }
                }
                
            }
            require_once('View/Register/index.php');
            
            break;
           
        
        default:
            # code...
            break;
    }
?>
