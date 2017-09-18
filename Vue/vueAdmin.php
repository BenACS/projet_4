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
    </article>
    <hr />
<?php endforeach; ?>