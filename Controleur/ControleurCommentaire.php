<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurCommentaire {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Supprime un commentaire
    public function supprimer($idCommentaire) {
        $this->commentaire->supprimer($idCommentaire);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }

    // "Modère" un commentaire existant
    public function moderer($idCommentaire) {
        $this->commentaire->moderer($idCommentaire);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }
}