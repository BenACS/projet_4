<?php $this->titre = "Projet 4"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <p>posté le <?= $billet['date'] ?></p>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
            </a>            
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
