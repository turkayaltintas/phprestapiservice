<?php

session_start();

if (isset($_POST['p'])) {
    session_unset();
    session_destroy();
}