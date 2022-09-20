<?php

// session_start();
session_destroy();
// echo 'session detruite !';
header('Location: index.php?page=accueil');
