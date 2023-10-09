<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost', // example.com
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

function regenerate_session_is () {
    session_regenerate_id();
    $_SESSION['last_regeneration'] = time();
}

if (!isset($_SESSION['last_regeneration'])){
    regenerate_session_is();
}
else {
    $interval = 60*30;
    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_is();
    }
}