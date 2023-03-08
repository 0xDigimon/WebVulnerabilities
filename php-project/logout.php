<?php 
#include 'allthings.php';

#session_destroy();
#redirect("login.php");
session_start();
include 'core/functions.php';
session_destroy();
redirect("login.php");
die;
