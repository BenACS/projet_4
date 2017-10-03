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
        $sql = 'delete from commentaires where id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }

    // Modifie (update) un commentaire dans la bdd
    public function moderer($idCommentaire) {
        /*  Le contenu est modifié, on ne permet pas à l'administrateur du blog de modifier lui-même le contenu,
            on met la valeur "signalements" à 0 afin que le commentaire, une fois modéré, ne s'affiche plus sur la
            page "commentaires signalés" (Il ne serait pas logique de l'afficher puisqu'il a déjà été modéré). */
        $sql = 'update commentaires set contenu = ?,'
                . ' signalements = 0'
                . ' where id = ?';

        $nouveauContenu = '"Ce commentaire a été modéré par l\'administration."'; // Texte indiquant que le contenu a été modéré
        $this->executerRequete($sql, array($nouveauContenu, $idCommentaire));
    }

    // Signale un commentaire (on augmente de 1 "signalements" dans la bdd)
    public function signaler($idCommentaire) {
        $sql = 'update commentaires set signalements=signalements+1 where id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }

    // Récupère la liste des commentaires signalés
    public function getComSignales() {
        $sql = 'select id, date_commentaire as date,'
                . ' pseudo as auteur,'
                . ' contenu from commentaires'
                . ' where signalements>=1'
                . ' order by signalements desc';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }
}