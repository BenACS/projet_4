<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    // Supprime un billet
    public function supprimer($idBillet) {
        $this->billet->supprimer($idBillet);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }

    // Ajoute / crée un nouveau billet
    public function ajouter($titre, $contenu) {
        $this->billet->ajouter($titre, $contenu);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }

    // Modifie un billet existant
    public function modifier($titre, $contenu, $idBillet) {
        $this->billet->modifier($titre, $contenu, $idBillet);
        $billets = $this->billet->getBillets();
        $vue = new Vue("Admin");
        $vue->generer(array('billets' => $billets));
    }
}