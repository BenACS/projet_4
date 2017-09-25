<?php

	require_once 'Modele/Utilisateur.php';
	require_once 'Controleur/ControleurAccueil.php';

	class ControleurAdmin {

		private $utilisateur;
		private $billet;
		private $commentaire;

		public function __construct() {
			$this->utilisateur = new Utilisateur();
		}

		public function connect($login, $mdp) {
			// Si la fonction renvoie "true"
			if ($this->utilisateur->verifierUtilisateur($login, $mdp)) {
				// On met la variable de session à "true"
				$_SESSION['login'] = true;

				// On génère / affiche l'interface admin
				$this->pageAdmin() ;
			}
			else {
				// Si la fonction ne renvoie pas "true", on affiche un message d'erreur
				throw new Exception("Login ou Mot de passe incorrect");
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

		// Génère / affiche l'interface admin
		public function pageAdmin() {
			$this->billet = new Billet();
	        $billets = $this->billet->getBillets();
	        $vue = new Vue("Admin");
	        $vue->generer(array('billets' => $billets));
	    }

	    public function billetAdmin($idBillet) {
	    	$this->billet = new Billet();
	    	$this->commentaire = new Commentaire();

			$billet = $this->billet->getBillet($idBillet);
	        $commentaires = $this->commentaire->getCommentaires($idBillet);
	        $vue = new Vue("BilletAdmin");
	        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
	    }

	    public function editeurBillet($idBillet) {
	    	$billet = $this->billet = new Billet();
	    	$vue = new Vue("FormModifBillet");
	    	$vue->generer(array('billet' => $billet));
	    }
	}