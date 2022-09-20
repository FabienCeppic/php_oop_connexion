<?php

function displayMessage($message)
{
    $msg = '<p class="display">';
    $msg .= $message;
    $msg .= '</p>';
    echo $msg;
}
