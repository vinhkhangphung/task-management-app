<?php

namespace Controllers;

class ErrorController
{
    function showError($msg = ""): void
    {
//        header("Location: ");
        echo "Error occur: " . $msg;
    }
}