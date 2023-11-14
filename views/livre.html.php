
<!-- 
        But de cet exercice : 
        Transformer la page livre.php "statique" en "dynamique" en remplaçant les champs par les données présentes dans data.php.
-->

<?php require_once 'data.php';

    //Récupérer l'id du livre sur livre.php?id=1
    $id = $_GET['id'] ?? null; //Si le paramètre est dans l'url, on le prend. Sinon on met "null".
    $bookFound = false;

    foreach ($books as $book) {
        if ($book['id'] == $id) {
            $bookFound = true;
            $title = $book['title'];
            $price = $book['price'];
            $discount = $book['discount'];
            $isbn = $book['isbn'];
            $author = $book['author'];
            $publishedAt = $book['published_at'];
            $image = $book['image'];
        }

    }

    if(!$bookFound) {
        http_response_code(404);
        require '404.php';
        die(); //Arrête le code (fonctionne aussi avec exit)
    }


?>

<?php require 'partials/header.php';?>

    <div class="max-w-5xl mx-auto px-3">
        <div class="lg:flex items-center">
            <div class="lg:w-1/2">
                <img class="rounded-lg max-w-full mx-auto mb-12" src="./<?= $image; ?>" alt="<?= $title; ?>">
            </div>
            <div class="lg:w-1/2">
                <h1 class="text-center text-2xl font-bold"><?= $title; ?></h1>

                <div class="flex items-center justify-between my-10">
                    <div>
                        <p class="text-4xl font-bold"><?= price($price, $discount); ?> € </p>
                        <?php if($discount > 0) {?><p class="text-lg font-bold">-<?= $discount ?>% <span class="line-through"><?= price($price); ?> €</span></p><?php }?>
                    </div>
                    <div class="text-lg text-gray-900">
                        <p>
                            Par <strong><?= $author; ?></strong>
                        </p>
                        <p>
                            Publié le <?= date('d/m/Y', strtotime($publishedAt)); ?> 
                            <!-- Pour la date : '18/08/2014' à afficher, '2014-08-18' dans les données. On utilise la fonction php date() pour formater la date. 1er argument = format / 2e argument = timestamp  -->
                        </p>
                    </div>
                </div>

                <p class="text-xl text-center text-gray-900">
                    ISBN: <strong><?= isbn($isbn); ?> </strong>
                </p>

                <div class="text-center mt-12">
                    <a class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200" href="/cart/1/add">
                        Ajouter au panier
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'partials/footer.php'; ?>
