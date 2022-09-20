<?php

function route(string $default): void
{
  $files = glob("./includes/*.inc.php");
  $page = $_GET['page'] ?? $default;
  $page = "./includes/" . $page . ".inc.php";

  if (in_array($page, $files))
    require $page;
  else
    require "./includes/" . $default . ".inc.php";
}
