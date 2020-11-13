<?php

$h = new Helper();
$msg = '';
$username = '';

if ( isset($_POST['submit']) ) {
    
    $username = $_POST['username'];

    //Tests
    if ( $h->isEmpty([$username, $_POST['password'], $_POST['confirm_password']]) ) {

        $msg = 'All fields are required';

    } else if ( !$h->isValidLength($username, 6, 100) ) {

        $msg = 'Username must be between 6 and 100 characters';

    } else if ( !$h->isValidLength($_POST['password']) ) {

        $msg = 'Password must be between 8 and 20 characters';

    } else if ( !$h->isSecure($_POST['password']) ) {

        $msg = 'Password must contain at least one lowercase character, one uppercase character and one digit';

    } else if ( !$h->passwordsMatch($_POST['password'], $_POST['confirm_password']) ) {

        $msg = 'Passwords do not match';

    } else {

        $newMember = new BlogMember($username);

        if  ( $newMember->isDuplicateID() ) {

            $msg = 'Username already exists';

        } else {

            $newMember->insertIntoMembers( $_POST['password'] );
            header("Location: index.php?new=1"); 

        }

    }



}