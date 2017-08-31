<?php
// lancer la session, verif si la variable existe, si non, on l'a crée
require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();