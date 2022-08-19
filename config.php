<?php
require "environment.php";

$config = array();

if(ENVIRONMENT == "development") {
    define("BASE_URL", "http://koonol.repo/");
    $config["dbname"] = "estrutura_mvc";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
} else {
    define("BASE_URL", "http://meusite.com.br/");
    $config["dbname"] = "";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "";
    $config["dbpass"] = "";
}

global $db;

try {
    $db = new PDO("mysql:dbname=".$config["dbname"].";host=".$config["dbhost"], $config["dbuser"], $config["dbpass"]);
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}