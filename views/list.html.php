<?php require 'partials/header.html.php'; ?>

<div class="max-w-5xl mx-auto">
    <a href="/books/creer" class="text-blue-400 underline">Créer un nouveau livre</a>
    
    <div class="flex flex-wrap"> 
            <?php foreach ($books as $book){ ?>
            <div class="w-1/2 lg:w-1/4 mb-6">
                <div class="shadow-lg rounded-lg h-full mx-3">
                    <div class="flex flex-col justify-between h-full">
                        <a href="/books/<?= $book['id']; ?>">
                            <img class="rounded-t-lg" src="<?= $book['image']; ?>" alt="<?= $book['title']; ?>">
                            <div class="p-4">
                                <h2 class="text-center"><?= $book['title']; ?></h2>
                                <div class="flex justify-around items-center">
                                    <p class="text-lg font-bold"><?= $book['price'], $book['discount']; ?> €</p>
                                    <?php if($book['discount'] > 0) {?><p class="text-xs font-bold">-<?= $book['discount']; ?>% <span class="line-through"><?= $book['price']; ?> €</span></p><?php }?>
                                </div>
                                <p class="text-xs text-center text-gray-400">
                                    Par <strong><?= $book['author']; ?></strong> en <?= date('Y', strtotime($book['published_at'])); ?>
                                </p>
                                <p class="text-xs text-center text-gray-400">
                                    ISBN: <strong><?= $book['isbn']; ?></strong>
                                </p>
                            </div>
                        </a>

                        <div class="text-center">
                            <a class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200 mb-4" href="/book/<?= $book['id']; ?>/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <a class="bg-red-700 px-4 py-2 text-white inline-block rounded hover:bg-red-500 duration-200 mb-4" href="/book/<?= $book['id']; ?>/delete">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
            <?php } ?>
</div>
        </div>

<?php require 'partials/footer.html.php'; ?>

