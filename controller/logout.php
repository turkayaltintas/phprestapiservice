<?php

if ($_POST) {
    include "../config/core.php";
    $logout = new user($db);
    $logout->logout();
}