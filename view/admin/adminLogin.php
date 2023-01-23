<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . '/model/Admin.php';
include $_SERVER['DOCUMENT_ROOT'] . '/controller/AdminController.php';

//if ($_POST['submit']) {
//    $admin = new AdminController();
//    $admin->adminLogin($_POST);
//}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
            rel="stylesheet"
    />

    <title>Document</title>
</head>
<body>
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-50 text-center mt-4 ">
        <h1>Admin Login</h1>
        <form class="p-4" autocomplete="off" method="post">
            <input class="form-control mt-2" value=""
                   type="email" name="email">
            <input class="form-control mt-2"
                   value=""
                   type="password" name="password">
            <div>
                <input class="" type="checkbox" name="checkbox">
            </div>
            <input class="btn  btn-success mt-2" type="submit" name="submit">
        </form>
    </div>


</div>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script type='text/javascript' src='/public/script.js'></script>
</script>
</body>
</html>