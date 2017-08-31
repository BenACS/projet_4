<?php

	class ControleurSession	{
		
		private $sessionId;
		private $sessionMdp;

		function __construct() {
			if (!isset ($_SESSION)) {
				$this->creerSession();
				$this->afficherSession();
			}
		}

		public function creerSession() {
			session_start();
			$this->sessionId = "a";
			$this->sessionMdp = "b";
		}

		public function afficherSession() {
			var_dump($this->sessionId);
			var_dump($this->sessionMdp);
		}
		
	}