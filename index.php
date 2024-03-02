<?php
session_start();

require_once 'db.php';
require_once 'routers.php';
require_once 'functions.php';

if (isset($_REQUEST['act']) && isset($routers[$_REQUEST['act']])){
    require_once $routers[$_REQUEST['act']];
}else {
    require_once 'action/index.php';
}

