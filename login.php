<?php
session_start();
include 'database/config.php';
include 'database/usersdb.php';
        $user = new User();
        $user->loginUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container mt-4 d-flex justify-content-center">
    <div class="w-50 text-center mt-4 ">
        <h1>Login</h1>
        <?php if (!empty($user->errors)): ?>
            <span class="text-danger"><?php echo $user->errors ?> </span>
        <?php endif; ?>
        <form class="p-4" autocomplete="off" method="post">
            <input class="form-control mt-2" value="<?php if (!empty($_COOKIE['login'])) echo $_COOKIE['login'] ?>"
                   type="email" name="email">
            <input class="form-control mt-2"
                   value="<?php if (!empty($_COOKIE['password'])) echo $_COOKIE['password'] ?>"
                   type="password" name="password">

            <input class="" type="checkbox" name="checkbox">
            <input class="btn form-control btn-success mt-2" type="submit" name="submit">

        </form>
        <button class="btn  btn-success mt-2"><a href="register.php">register</a></button>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>