<!-- Ajouter un billet -->
<form class="boutAjoutBillet" method="POST" action="index.php?action=nouveauBillet">
    <input type="submit" value="Ajouter un nouveau billet">
</form>
<hr />
<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <!-- Billet -->
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
            </a>
            <p>posté le <?= $billet['date'] ?></p>
        </header>
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
<?php endforeach; ?>