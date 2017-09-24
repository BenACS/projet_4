<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select id, date_creation as date,'
                . ' titre, contenu from billets'
                . ' order by id desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select id, date_creation as date,'
                . ' titre, contenu from Billets'
                . ' where id=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function supprimer($idBillet) {
        $sql = 'delete from Billets where id=?';
        $billet = $this->executerRequete($sql, array($idBillet));
    }

    public function ajouter($titre, $contenu) {
        $sql = 'insert into billets(titre, contenu, date_creation)' . ' values(?, ?, ?)';
        $date = date("Y-m-d");
        $this->executerRequete($sql, array($titre, $contenu, $date));
    }

    public function modifier() {
        $sql = "";
        $billet = $this->executerRequete($sql, array());
    }
}