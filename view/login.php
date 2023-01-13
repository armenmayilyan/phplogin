<?php
include '../controller/HomeController.php';
include '../controller/UserLogin.php';
include './header/header.php';

use HomeController as home;

if ($_POST['submit']) {
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'checkbox' => $_POST['checkbox']
    ];
    home::login($data);
}
?>

    <div class="container mt-4 d-flex justify-content-center">
        <div class="w-50 text-center mt-4 ">
            <h1>Login</h1>
            <form class="p-4" autocomplete="off" method="post">
                <input class="form-control mt-2" value="<?php if (!empty($_COOKIE['login'])) echo $_COOKIE['login'] ?>"
                       type="email" name="email">
                <input class="form-control mt-2"
                       value="<?php if (!empty($_COOKIE['password'])) echo $_COOKIE['password'] ?>"
                       type="password" name="password">
                <div>
                    <input class="" type="checkbox" name="checkbox">
                </div>
                <input class="btn  btn-success mt-2" type="submit" name="submit">
            </form>
        </div>


    </div>
<?php
include "./footer/footer.php";
?>