<?php
    function success($type){
        switch ($type) {
            case 'add_user_success':
                echo 'User Added Successfully!';
                break;
            
            default:
                echo 'Lỗi không xác định.';
                break;
        }
    }

    function error($type) {
        switch ($type) {
            case 'empty_fields':
             echo 'Please fill in all information.';
                break;
            case 'password_mismatch':
                echo 'Passwords do not match.';
                break;



            default:
                echo 'Lỗi không xác định.';
                break;
        }
    }
?>
