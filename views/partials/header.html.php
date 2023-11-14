<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Book PHP'; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="font-[Ubuntu]">
    <div class="max-w-5xl mx-auto px-3 mb-8">
        <div class="flex justify-between items-center py-6 border-b">
            <h2 class="text-3xl">
                <a href="/">Book PHP</a>
            </h2>
            <form class="relative" action="livres.php">
                <input type="text" name="search" class="px-3 pl-8 rounded-lg border-gray-300" value="<?= $search ?? ''; ?>">
                <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </form>
            <ul>
                <li>
                    <a class="px-4" href="/">Accueil</a>
                    <a class="px-4" href="/books">Livres</a>
                    <a class="px-4" href="/cart">Panier (0)</a>
                    <a class="px-4" href="/login">Connexion</a>
                    <a class="px-4" href="/a-propos">A propos</a>
                </li>
            </ul>
        </div>
    </div>

        