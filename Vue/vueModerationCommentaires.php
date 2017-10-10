<?php $this->titre = "Projet 4 - Signalements"; ?>

<?php foreach ($commentaires as $commentaire): ?>
    <article class="cont_comment">
        <p class="auteur"><?= htmlspecialchars($commentaire['auteur']) ?> dit :</p>
        <p class="comment"><?= htmlspecialchars($commentaire['contenu']) ?></p>
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