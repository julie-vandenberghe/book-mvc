<?php require 'partials/header.html.php'; ?>
    <div class="max-w-5xl mx-auto px-3">
        <h1 class="text-center font-bold text-3xl py-5">Recherche de livre</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <?php if ($results === null) { ?>
                <div>
                    <p>Veuillez saisir le titre ou ISBN</p>
                    <form action="" method="post">
                        <input type="text" name="titleOrISBN" />

                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            <?php } else { ?>
                <div><?= count($results); ?> livres trouvés</div>
                <?php foreach ($results as $book) { ?>
                    <div>
                        <h2 class="text-center font-bold text-lg"><?= $book['title']; ?></h2>
                        <p class="text-center">Auteur: <strong><?= $book['author']; ?></strong></p>
                        <p class="text-center">Prix: <strong><?= $book['price']; ?></strong></p>
                        <p class="text-center">Date: <strong><?= $book['published_at']; ?></strong></p>
                        <img class="w-full h-[350px] object-cover" src="<?= $book['image']; ?>" alt="<?= $book['title']; ?>">
                    </div>
                <?php }
            } ?>
        </div>
    </div>
<?php require 'partials/footer.html.php'; ?>
