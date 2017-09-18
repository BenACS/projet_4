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
			// Si la fonction renvoie "true"
			if ($this->utilisateur->verifierUtilisateur($login, $mdp)) {
				// On met la variable de session à "true"
				$_SESSION['login'] = true;

				// On génère / affiche la vue d'accueil du blog
				$this->billet = new Billet();
				$billets = $this->billet->getBillets();
				$vue = new Vue("Accueil");
        		$vue->generer(array('billets' => $billets));
			}
			else {
				// Si la fonction ne renvoie pas "true", on affiche un message d'erreur
				throw new Exception("Erreur : Login ou Mot de passe incorrect.");
			}
		}

		public function deconnecter() {
			// On met la variable de session à "false"
			$_SESSION['login'] = false;

			// On génère / affiche la vue d'accueil du blog
			$this->billet = new Billet();
			$billets = $this->billet->getBillets();
			$vue = new Vue("Accueil");
        	$vue->generer(array('billets' => $billets));
		}
	}