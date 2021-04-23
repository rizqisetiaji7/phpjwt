<?php 
    require_once __DIR__.'/vendor/autoload.php';
    require_once __DIR__.'/src/session.php';

    $message = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (SessionManager::login($_POST['username'], $_POST['password'])) {
            header('Location: http://localhost/php-jwt/');
            exit(0);
        } else {
            $message = 'Login Gagal! Masukkan Username dan password yang sesuai.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto box-border px-5 h-screen flex flex-row items-center justify-center">
        <div class="bg-white px-7 py-10 rounded-lg relative w-full md:w-7/12 lg:w-5/12 xl:w-4/12 shadow-md">
            <h3 class="text-lg sm:text-xl font-bold uppercase text-gray-800 mb-1.5">Welcome Back <span class="text-indigo-600">User</span></h3>
            <p class="text-gray-400 text-sm">Login authentication with JWT.</p>

            <?php if($message) { ?>
                <div class="mt-5 bg-red-200 p-4 rounded">
                    <p class="text-red-500 text-xs"><?= $message ?></p>
                </div>
            <?php } ?>

            <form action="" method="POST" class="mt-5 block relative">
                <div class="mb-4">
                    <input type="text" name="username" class="px-4 py-2.5 w-full bg-gray-50 focus:outline-none focus:ring focus:ring-indigo-200 border border-gray-200 focus:border-indigo-500 rounded text-gray-700 placeholder-gray-300" placeholder="Username" autocomplete="off">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="px-4 py-2.5 w-full bg-gray-50 focus:outline-none focus:ring focus:ring-indigo-200 border border-gray-200 focus:border-indigo-500 rounded text-gray-700 placeholder-gray-300" placeholder="Password">
                </div>

                <button type="submit" name="login" class="py-3 bg-indigo-600 text-white w-full rounded focus:outline-none focus:ring focus:ring-indigo-200 focus:bg-indigo-700 uppercase tracking-wider font-medium transition ease-in-out hover:bg-indigo-500">Login</button>
            </form>
        </div>
    </div>

    <!-- <h1>Login</h1>
    <form action="" method="post">
        <label>Username : 
            <input type="text" name="username">
        </label>
        <label>Password : 
            <input type="password" name="password">
        </label>
        <br />
        <input type="submit" value="Login">
    </form> -->
</body>
</html>