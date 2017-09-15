<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Blog de l'écrivain "Jean-Paulet"</h1></a>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
        </div> <!-- #global -->
                    <footer>
                <?php if ($_SESSION['login']) {

                        } 
                        else {
                            include "vueConnexion.php";
                        }
                ?>
            </footer>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8fwlfhhvvlj749bi3q9l558no7zzxrkq6ab6i8azo2id6vgw"></script>
        <script>
            tinymce.init({
                selector: '#divTinyMCE'
            });
        </script>
        <form id="formTinyMCE" method="post">
            <textarea id="divTinyMCE"></textarea>
        </form>
        <script src="Vue/js/popupTinyMCE.js"></script>
    </body>
</html>