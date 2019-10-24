<?php
if(isset($_COOKIE["user_name"]) && isset($_COOKIE["user_id"]))
{
 echo '<h2 align="center">Welcome '.$_COOKIE["user_name"].'</h2>';
}
?>
