<?php
include '../core/functions.php';
include '../core/validations.php';
include '../inc/header.php';
$errors=[];

if(checkRequestMethod("POST")){
    if(checkPostInput('name')){
        foreach($_POST as $key=>$value){
            $$key=sanitizeInput($value);
        }
        // $name=sanitizeInput($_POST['name']);
        // echo $name;

        // validations
        // name >> min:1, max:30

        if(!requiredval($name)){
            $errors[]="name is required";
        }
        elseif(!maxval($name,30)){
            $errors[]="name must be smaller than 30 chars";
        }

        // email 
        if(!requiredval($email)){
            $errors[]="email is required";
        }
        elseif(!emailval($email)){
            $errors[]="please type a valid email";
        }
        


        // password


        if(!requiredval($password)){
            $errors[]="password is required";
        }
        elseif(!minval($password,8)){
            $errors[]="password must be greater than 8 digits";
        }


        if (empty($errors)){
            $users_file=fopen("../data/users.csv","a+");
            $data=[$name,$email,sha1($password)];
            fputcsv($users_file,$data);

            //redirect
            $_SESSION['auth']=$data;
            redirect("../login.php");
            die;
        }
        else {
            $_SESSION['errors']=$errors;
            redirect("../register.php");
            die;
        }

    }
}
else {
    echo "Not Supported Method";
}