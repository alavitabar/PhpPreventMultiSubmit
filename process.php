<?php
//process.php

// start session
session_start();

if($_POST['form_token'] != $_SESSION['form_token'])
{
    echo 'Access denied';
} else {
    unset($_SESSION["form_token"]);
    print_r($_POST);
// do your logic
}

$_SESSION['form_token'] = "";