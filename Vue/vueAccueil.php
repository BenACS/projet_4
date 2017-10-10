<?php $this->titre = "Projet 4"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h2 class="titreBillet"><?= htmlspecialchars($billet['titre']) ?></h2>
            </a>
            <p>posté le <?= htmlspecialchars($billet['date']) ?></p>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>