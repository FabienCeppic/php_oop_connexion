<?php

function redirection(string $url, int $time): string
{
    $html = "<script>";
    $html .= "setTimeout(\"location.href = '$url';\", $time);";
    $html .= "</script>";

    return $html;
}
