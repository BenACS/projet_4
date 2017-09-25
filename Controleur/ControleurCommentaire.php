<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurCommentaire {

    private $commentaire;

    public function __construct() {
        $this->commentaire = new Commentaire();
    }

    // Supprime un commentaire
    public function supprimer($idCommentaire) {
        $this->billet = new Billet();
        $this->commentaire->supprimer($idCommentaire);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }
}