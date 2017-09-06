<?php

	class Utilisateur extends Modele {

		public function __construct() {

		}

		public function verifierUtilisateur($login, $mdp) {
			/*
				Comparer $login et $mdp hashé par rapport au fichier
			*/

			$mdp_hashe = hash("sha256", $mdp);
			$utilisateur = $login . "," . $mdp_hashe;

			$fichier = fopen('identifiants.php', 'r');
			$test = fgets($fichier);

			var_dump($test);
			fclose($fichier);

			return true;
		}
	}