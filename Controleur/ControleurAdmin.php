<?php

	require_once 'Modele/Utilisateur.php';
	require_once 'Controleur/ControleurAccueil.php';

	class ControleurAdmin {

		private $utilisateur;
		private $billet;

		public function __construct() {
			$this->utilisateur = new Utilisateur();
		}

		public function connect($login, $mdp) {
			if ($this->utilisateur->verifierUtilisateur($login, $mdp)) {
				// Si la fonction renvoie "true"...
				$_SESSION['login'] = true;

				// On génère la vue d'administration du blog
				$vue = new Vue("Connexion");
        		$vue->generer(array());
			}
			else {
				// Si la fonction ne renvoie pas "true", on affiche un message d'erreur
				throw new Exception("Erreur : Login ou Mot de passe incorrect.");
			}
		}
	}