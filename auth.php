<?php
session_start();
$error = null;
$identifiant = "admin";
$password = "admin";

if(isset($_POST["submit"])) {
    if(!empty($_POST['id'])) {
        if(!empty($_POST['mdp'])) {
            if($_SESSION["valid"] = $_POST["id"] === $identifiant && $_POST["mdp"] === $password) {
                header('location: dashboard.php', true, 302);
                exit;
            } else {
                header('location: connect.php?invalid_login', true, 303);
                exit;
            }
        } else {
            header('location: connect.php?invalid_pass', true, 303);
            exit;
        }
    } else {
        header('location: connect.php?invalid_id', true, 303);
        exit;
    }
}
