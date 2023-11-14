<?php require 'partials/header.html.php'; ?>
    
<div class="max-w-5xl mx-auto">
    <h1 class="text-2xl">Créer un nouveau livre</h1>
    <?php // foreach ($errors as $error) { ?>
        <!-- <p><? //= $error; ?></p> -->
    <?php //}?>
    <form action="" method="post">
        <input type="text" name="name" value="<?//= $book->title;?>">
        <button>Sauvegarder</button>
    </form>

    <form action="" method="post" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block">Titre *</label>
                <input type="text" name="title" id="title" class="border-0 border-b focus:ring-0 w-full" value="">
            </div>
            

            <div class="text-center">
                <button class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200">Créer</button>
            </div>
        </form>
</div>

<?php require 'partials/footer.html.php'; ?>