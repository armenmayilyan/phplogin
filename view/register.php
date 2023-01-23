<?php
include '../controller/HomeController.php';
include "./header/header.php";
if ($_SESSION['id']) {
    header("location: index.php");
}
if ($_POST['submit']) {
    $user = HomeController::create($_POST);
}
?>
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-50 text-center mt-4 ">
        <h1>Register</h1>
        <form class="p-4" autocomplete="off" method="post">
            <input class="form-control mt-2" value=""
                   type="email" placeholder="email" name="email">
            <input class="form-control mt-2"
                   value=""
                   type="text"  placeholder="name" name="name">
            <input class="form-control mt-2"
                   value=""
                   type="password" placeholder="password" name="password">
            <input class="form-control mt-2"
                   value=""
                   type="password" placeholder="Confirm Password" name="confirmPassword">
            <input class="btn  btn-success mt-2" type="submit" name="submit">

        </form>
    </div>


</div>
<?php
include "./footer/footer.php";
?>