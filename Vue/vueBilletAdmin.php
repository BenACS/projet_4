<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>
<form method="POST" action="<?= "index.php?action=modifBillet&id=" . $billet['id'] ?>">
        <input type="submit" value="Modifier ce billet">
</form>
<article>
    <header>
        <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
        <p>posté le <?= $billet['date'] ?></p>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<header>
    <h3>Commentaires :</h3>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <article class="cont_comment">
        <p class="auteur"><?= $commentaire['auteur'] ?> dit :</p>
        <p class="comment"><?= $commentaire['contenu'] ?></p>
        <form method="POST" action="">
            <input type="submit" value="Modifier ce commentaire">
        </form>
        <form method="POST" action="<?= "index.php?action=supprimerCom&id=" . $commentaire['id'] ?>">
            <input type="submit" value="Supprimer">
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