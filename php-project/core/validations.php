<?php


function requiredval($input)// validation on inputs 
{   
    if(!empty($input)){
        return true;
    }
    else {
        return false;
    }
}

function maxval($input,$length){
    if(strlen($input)>=$length){
        return false;
    }
    return true;

}

function emailval($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;

}
function minval($password,$minlength){
    if(strlen($password)>$minlength){
        return true;
    }
    return false;

}
