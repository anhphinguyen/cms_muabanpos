<?php

function is_register()
{
    if (isset($_SESSION['is_register'])) {
        return true;
    } else {
        return false;
    }
}