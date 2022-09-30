<?php 

/**
 * @package iDose 
 * @author change <spr1t3-0@riseup.net>
 * @since 0.0.1
 * 
 * Environment configuration
 */

# Database connection profiles
const DB_Connections = [
    "PRODUCTION" => [
        "HOST" => "",
        "NAME" => "",
        "USERNAME" => "",
        "PASSWORD" => "",
    ], 
    "DEVELOPMENT" => [
        "HOST" => "localhost",
        "NAME" => "idose",
        "USERNAME" => "idose",
        "PASSWORD" => "tripsit1"
    ]
];

# Current environment
const ENVIRONMENT = "DEVELOPMENT";

# App Name
const APP_NAME = "iDose";

# App Root Directory
define('APP_ROOT', dirname(__FILE__, 2));

