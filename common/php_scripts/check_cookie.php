<?php
//index.php


// if cookie not set, go to login page.
if(!isset($_COOKIE["user_id"]) && !isset($_COOKIE["user_name"]))
{
 header("location:login.php");
}

?>
