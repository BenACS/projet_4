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
			/*
				Demander au modèle si l'utilisateur existe ou non
				Si oui, alors mettre la variable de session à true et générer la vue d'administration

				Si non, alors on renvoie sur le formulaire de connexion avec un message d'erreur
			*/

			if ($this->utilisateur->verifierUtilisateur($login, $mdp)) {
				// Si la fonction renvoie "true"...
				$_SESSION['login'] = true;

				// On génère la vue d'administration du blog
				$vue = new Vue("Connexion");
        		$vue->generer(array());
			}
			else {
				// Si la fonction ne renvoie pas "true"...
				$this ->billet = new Billet();
        		$billets = $this->billet->getBillets();
       			$vue = new Vue("Accueil");
        		$vue->generer(array('billets' => $billets));

				throw new Exception("sdfdsfsd");

        		// Le formulaire étant "hidden" par défaut, on l'affiche en ajoutant un message d'erreur
        		echo "<script> affichierPopup(); msgErreur(); </script>";
			}
		}
	}