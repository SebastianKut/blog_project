<?php

$h = new Helper();
$msg = '';
$username = '';

if ( isset($_POST['submit']) ) {
    
    $username = $_POST['username'];
    
    if( $h->isEmpty([$username, $_POST['password']]) ) {

        $msg = 'All fields are required'; 

    } else {

        $admin = new Admin($username);

        if ( $admin->isValidLogin($_POST['password']) ) {
        
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = true;
            header('Location: write.php');
        
        } else {

            $msg = "Invalid Username or Password";

        }

    }


}