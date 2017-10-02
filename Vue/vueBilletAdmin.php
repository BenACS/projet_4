<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>
<article>
    <header>
        <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
        <p>posté le <?= $billet['date'] ?></p>
    </header>
    <p><?= $billet['contenu'] ?></p>
    <!-- Modifier le billet -->
    <form class="boutModif" method="POST" action="<?= "index.php?action=editeurBillet&id=" . $billet['id'] ?>">
        <button type="submit">
            <i class="material-icons">create</i>
        </button>
    </form>
    <!-- Supprimer le billet -->
    <form class="boutSuppr" method="POST" action="<?= "index.php?action=supprimerBillet&id=" . $billet['id'] ?>">
        <button type="submit">
            <i class="material-icons">clear</i>
        </button>
    </form>
</article>
<hr />
<header>
    <h3>Commentaires :</h3>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <article class="contComment">
        <p class="auteur"><?= $commentaire['auteur'] ?> dit :</p>
        <p class="comment"><?= $commentaire['contenu'] ?></p>
        <!-- "Modifier" le commentaire -->
        <form class="boutModif" method="POST" action="<?= "index.php?action=modererCom&id=" . $commentaire['id'] ?>">
            <button type="submit">
                <i class="material-icons">create</i>
            </button>
        </form>
        <!-- Supprimer le commentaire -->
        <form class="boutSuppr" method="POST" action="<?= "index.php?action=supprimerCom&id=" . $commentaire['id'] ?>">
            <button type="submit">
                <i class="material-icons">clear</i>
            </button>
        </form>
    </article>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>