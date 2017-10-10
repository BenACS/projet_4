<?php $this->titre = "Projet 4 - " . $billet['titre']; ?>

<article>
    <header>
        <h2 class="titreBillet"><?= htmlspecialchars($billet['titre']) ?></h2>
        <p>posté le <?= htmlspecialchars($billet['date']) ?></p>
    </header>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<header>
    <h3>Commentaires :</h3>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <article class="cont_comment">
        <p class="auteur"><?= htmlspecialchars($commentaire['auteur']) ?> dit :</p>
        <p class="comment"><?= htmlspecialchars($commentaire['contenu']) ?></p>
        <!-- Signaler le commentaire -->
        <form class="boutSignaler" method="POST" action="<?= "index.php?action=signaler&id=" . $commentaire['id'] ?>">
            <button type="submit">
                <i class="material-icons">report</i>
            </button>
        </form>
    </article>
<?php endforeach; ?>
<hr />
<!-- Poster un commentaire -->
<form method="POST" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /></br>
    <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required></textarea></br>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>