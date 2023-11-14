<?php 
require_once 'config/database.php'; 
require_once 'data.php'; 


$title = 'Ajouter un livre'; //Titre de la page

/* 
* RÉCUPÉRATION DES DONNÉES
*/
//On vérifie que y'a qqch dans le champ name et on l'affecte à $name. S'il n'y a rien, on affecte null à la variable
$titleBook = $_POST['title'] ?? ''; // ?? '' -> fonctionne que en php 7.0 minimum
//$name = isset($_POST['name']) ? $_POST['name'] : null; //même chose que au-dessus mais en php 5
$price = $_POST['price'] ?? '';
$discount = $_POST['discount'] ?? '';
$isbn = $_POST['isbn'] ?? '';
$author = $_POST['author'] ?? '';
$date = $_POST['published_at'] ?? '';
$image = $_POST['image'] ?? '';

//Préparation du tableau d'erreur
$errors = [];


/* 
* VÉRIFICATION DES DONNÉES
*/
if (!empty($_POST)) {
    //Test sur le titre
    if (empty($titleBook)) {
        $errors['title'] = 'Le titre est invalide.';
    }

    //Test sur le prix
    if ($price < 1 || $price > 100) { //Pas besoin de tester si empty bien que obligatoire car "null" considéré comme 0 et donc inférieur à 1
        $errors['price'] = 'Le prix est invalide (il est obligatoire et doit être compris entre 1 et 100).';
    }

    //Test sur la remise
    if (!empty($discount) && ($discount > 100 || $discount < 0)) {
        $errors['discount'] = 'La promotion doit être comprise entre 0 et 100.';
    }

    //Test sur l'ISBN
    if (strlen($isbn) !== 10 && strlen($isbn) !== 13) {
        //Ici, pas de "ou" car sinon 13 est différent de 10 et donc ne mettra pas le message d'erreur
        $errors['isbn'] = 'L\'ISBN doit contenir 10 ou 13 chiffres.';
    }

    //Test sur l'auteur
    if (empty($author)) {
        $errors['author'] = 'L\'auteur est invalide.';
    }

    //Test sur la date
    //Exemple de date retournée : '2023-11-06';
    $checked = explode('-', $date); //On va avoir en sortie [2023, 11, 06]
    if(!checkdate($checked[1] ?? 0, $checked[2] ?? 0, (int) $checked[0])) {
        //checkdate est une fonction php qui vérifie une date et a pour args : checkdate(int $month, int $day, int $year): bool
        //int permet de caster une chaîne en entier
        $errors['published_at'] = 'La date est invalide.';
    }

    //Test sur l'image
    // if (strlen($image) <= 0) {
    //     $errors['image'] = 'L\'image du livre est obligatoire.';
    // }

        if (empty($errors)) { //Pas d'erreurs dans le formulaire

        //$db->query("INSERT INTO contacts (name, message) VALUES('$name', '$message')");
        //Le code ci-dessus permettrait de faire une injection sql !! En tapant Toto'); DROP DATABASE toto; -> supprimerait la bdd toto.
        //Pour éviter cela, on doit toujours préparer les requêtes dès qu'il y a concaténation.

        //Ici, on utilise une fonction insert qu'on a déclaré dans data.php
        insert('INSERT INTO books (title, price, discount, isbn, author, published_at, image) VALUES(?, ?, ?, ?, ?, ?, ?)', [
            //utiliser méthode php htmlspecialchars afin de transformer "<" en &lt; par exemple et ainsi prévenir injection JS car va transformer les <script>alert('Ok');</alert>
            htmlspecialchars($titleBook),
            $price,
            $discount,
            $isbn,
            htmlspecialchars($author),
            $date,
            'uploads/06.jpg',
        ]);

        //Message dans la session
        // Avant la redirection, on ajoute un message dans la session (pour info la session = un tableau). Ce message sera affiché plus tard.
        //Message dans la session (on utilise ici une fonction addMessage qu'on a déclarée dans data.php)
        //$_SESSION['success']
        addMessage('Votre livre a été ajouté !' . htmlspecialchars($titleBook));

        // Redirection 
        //(on utilise ici une fonction redirect qu'on a déclarée dans data.php)
        redirect('livres.php');
    }
}

require_once 'partials/header.php'; 
?>

    <div class="max-w-5xl mx-auto px-3">
        <?php if (!empty($errors)) { ?>
        <!-- Mettre un var_dump ici permet d'afficher les erreurs -->
        <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 my-4">
            <?php foreach($errors as $error) {?>
                <p>
                    <?= $error; ?>        
                </p>
            <?php } ?>
        </div>
        <?php } ?>

<!-- /* 
* FORMULAIRE
*/ -->
        <form action="" method="post" class="w-1/2 mx-auto" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block">Titre *</label>
                <input type="text" name="title" id="title" class="border-0 border-b focus:ring-0 w-full" value="<?= $titleBook; ?>">
            </div>
            <div class="mb-4">
                <label for="price" class="block">Prix *</label>
                <input type="text" name="price" id="price" class="border-0 border-b focus:ring-0 w-full" value="<?= $price; ?>">
            </div>
            <div class="mb-4">
                <label for="discount" class="block">Promotion</label>
                <input type="text" name="discount" id="discount" class="border-0 border-b focus:ring-0 w-full" value="<?= $discount; ?>">
            </div>
            <div class="mb-4">
                <label for="isbn" class="block">ISBN *</label>
                <input type="text" name="isbn" id="isbn" class="border-0 border-b focus:ring-0 w-full" value="<?= $isbn; ?>">
            </div>
            <div class="mb-4">
                <label for="author" class="block">Auteur *</label>
                <input type="text" name="author" id="author" class="border-0 border-b focus:ring-0 w-full" value="<?= $author; ?>">
            </div>
            <div class="mb-4">
                <label for="published_at" class="block">Publié le *</label>
                <input type="date" name="published_at" id="published_at" class="border-0 border-b focus:ring-0 w-full" value="<?= $date; ?>">
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2">Image *</label>
                <input type="file" name="image" id="image" class="cursor-pointer w-full
                    file:rounded-full file:border-0 file:cursor-pointer
                    file:bg-blue-50 hover:file:bg-blue-100
                    file:font-semibold file:py-2 file:px-4 file:mr-4
                ">
            </div>

            <div class="text-center">
                <button class="bg-gray-900 px-4 py-2 text-white inline-block rounded hover:bg-gray-700 duration-200">Créer</button>
            </div>
        </form>
    </div>

    <?php require 'partials/footer.php'; ?>
