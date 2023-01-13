<?php
include '../controller/HomeController.php';
include '../controller/UserDto.php';
include "./header/header.php";

if (isset($_POST['submit'])) {
    $user = HomeController::register($_POST);

}
?>
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-50 text-center mt-4 ">
        <h1>Register</h1>
        <form class="p-4" autocomplete="off" method="post">
            <input class="form-control mt-2" value=""
                   type="email" name="email">
            <input class="form-control mt-2"
                   value=""
                   type="text" name="name">
            <input class="form-control mt-2"
                   value=""
                   type="password" name="password">
            <input class="form-control mt-2"
                   value=""
                   type="password" name="confirmPassword">
            <input class="btn  btn-success mt-2" type="submit" name="submit">

        </form>
    </div>


</div>
<?php
include "./footer/footer.php";
?>