<?php 
    require_once __DIR__.'/vendor/autoload.php';
    require_once __DIR__.'/src/session.php';

    try {
        $session = SessionManager::getCurrentSession();
    } catch (Exception $exception) {
        header('Location: http://localhost/php-jwt/login.php');
        exit(0);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP JWT</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto box-border px-5 h-screen flex flex-row items-center justify-center">
    <div class="bg-white px-7 py-10 rounded-lg relative w-full md:w-7/12 lg:w-5/12 xl:w-4/12 shadow-md">
        <h3 class="text-lg sm:text-xl font-bold uppercase text-gray-800 mb-1.5">Welcome Back <span class="text-green-500"><?= $session->username ?></span></h3>
        <a href="http://localhost/php-jwt/logout.php" class="text-gray-400 text-xs">Click here to <span class="text-indigo-600 hover:underline">Logout</span></a>
    </div>
</div>
</body>
</html>