<?php
include '../core/functions.php';
include '../core/validations.php';
include '../inc/header.php';

$errorlog=[];
if(checkRequestMethod("POST")){
    if(checkPostInput('email')){
        foreach($_POST as $key=>$value){
            $$key=sanitizeInput($value);
        }
        // email 
        if(!requiredval($email)){
            $errorlog[]="email is required";
        }
        elseif(!emailval($email)){
            $errorlog[]="please type a valid email";
        }
        // password
        if(!requiredval($password)){
            $errorlog[]="password is required";
        }

        if (empty($errorlog)){
            if (!emailval($email) || !requiredval($password)) {
                die('Please enter a valid email or password');
            }
            $success = false;
            $handle = fopen("../data/users.csv", "r");

            while (($data = fgetcsv($handle)) !== FALSE) {
                if ($data[1] == $email && $data[2] == sha1($password)) {
                    $success = true;
                    break;
                }
            }

            fclose($handle);

            if ($success) {
                $_SESSION['auth']=$data;
                redirect("../index.php");
                die;
            } else {
                $errorlog[]="incorrect email or password";
                $_SESSION['errorlog']=$errorlog;
                redirect("../login.php");
            }
        }
        else {
            $_SESSION['errorlog']=$errorlog;
            redirect("../register.php");
            die;
        }
    }
}
else {
    echo "Not Supported Method";
}