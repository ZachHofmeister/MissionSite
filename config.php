<?php
//Good PHP Settings
error_reporting(error_level: E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', TRUE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', '/phpErrors/phpErrorLog-missionSite.log'); // Logging file path

// Start a session
if (session_status() === PHP_SESSION_NONE)
    session_start();

// Constant ROOT_PATH, used for creating paths
define ('ROOT_PATH', realpath(dirname(__FILE__)));

//Open DB connection once
require_once ROOT_PATH . "/db/database.php";
?>