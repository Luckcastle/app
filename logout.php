<?php

// encerra a sessão

session_start();
session_unset();
session_destroy();

header('Location: entrar.php');