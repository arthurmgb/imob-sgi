<?php
ini_set('session.gc_maxlifetime', 43200);
ini_set('session.cookie_lifetime', 43200);
session_start();
require 'config.php';

spl_autoload_register(function ($class){
    if(file_exists('controllers/'.$class.'.php')) {
        require_once 'controllers/'.$class.'.php';
    }
    elseif(file_exists('models/'.$class.'.php')) {
        require_once 'models/'.$class.'.php';
    }
    elseif(file_exists('core/'.$class.'.php')) {
        require_once 'core/'.$class.'.php';
    }
    elseif(file_exists('helpers/'.$class.'.php')) {
        require_once 'helpers/'.$class.'.php';
    }
});

$core = new Core();
$core->run();
