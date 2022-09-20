<?php

$functions = glob("./functions/*.php");

if (is_array($functions)) {
    foreach ($functions as $function) {
        if (!($function === "./functions/functionsLoading.php")) {
            require $function;
        }
    }
}
