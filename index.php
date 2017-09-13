<?php

// lancer la session, verif si la variable existe, si non, on l'a crée
session_start();
if (!isset ($_SESSION['login'])) {
	$_SESSION['login'] = false;
}

require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();