<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select id, date_commentaire as date,'
                . ' pseudo as auteur, contenu from commentaires'
                . ' where id_billet=? order by date desc';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la bdd
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into commentaires(date_commentaire, pseudo, contenu, id_billet)'
                . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    // Supprime un commentaire dans la bdd
    public function supprimer($idCommentaire) {
        $sql = 'delete from Commentaires where id=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
    }

    // Modifie un commentaire dans la bdd
    public function modifier() {

    }
}