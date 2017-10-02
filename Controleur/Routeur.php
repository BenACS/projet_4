<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Controleur/ControleurCommentaire.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlSession;
    private $ctrlCommentaire;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAdmin = new ControleurAdmin();
        $this->ctrlCommentaire = new ControleurCommentaire();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        if ($_SESSION['login'] == true) {
                            $this->ctrlAdmin->billetAdmin($idBillet);
                        }
                        else {
                            $this->ctrlBillet->billet($idBillet);
                        }
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'connexion') {
                    $login = $this->getParametre($_POST, 'login');
                    $mdp = $this->getParametre($_POST, 'mdp');
                    $this->ctrlAdmin->connect($login, $mdp);
                }
                else if ($_GET['action'] == 'deconnexion') {
                    $this->ctrlAdmin->deconnecter();
                }
                else if ($_GET['action'] == 'admin') {
                    if ($_SESSION['login'] == 'true') {
                        $this->ctrlAdmin->pageAdmin();
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'supprimerBillet') {
                    if ($_SESSION['login'] == 'true') {
                        $idBillet = intval($this->getParametre($_GET, 'id'));
                        $this->ctrlBillet->supprimer($idBillet);
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'nouveauBillet') {
                    if ($_SESSION['login'] == 'true') {
                        $vue = new Vue("FormCreationBillet");
                        $vue->generer(array());
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'ajouterBillet') {
                    if ($_SESSION['login'] == 'true') {
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrlBillet->ajouter($titre, $contenu);
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'editeurBillet') {
                    if ($_SESSION['login'] == 'true') {
                        $idBillet = intval($this->getParametre($_GET, 'id'));
                        if ($idBillet != 0) {
                            $this->ctrlAdmin->editeurBillet($idBillet);
                        }
                        else
                            throw new Exception("Identifiant de billet non valide");
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'modifierBillet') {
                    if ($_SESSION['login'] == 'true') {
                        $idBillet = intval($this->getParametre($_POST, 'id'));
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrlBillet->modifier($titre, $contenu, $idBillet);
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'supprimerCom') {
                    if ($_SESSION['login'] == 'true') {
                        $idCommentaire = intval($this->getParametre($_GET, 'id'));
                        $this->ctrlCommentaire->supprimer($idCommentaire);
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'modererCom') {
                    if ($_SESSION['login'] == 'true') {
                        $idCommentaire = intval($this->getParametre($_GET, 'id'));
                        $this->ctrlCommentaire->moderer($idCommentaire);
                    }
                    else
                        throw new Exception("Accès non autorisé");
                }
                else if ($_GET['action'] == 'signaler') {
                    $idCommentaire = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlCommentaire->signaler($idCommentaire);
                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
