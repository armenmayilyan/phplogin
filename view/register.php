<?php
include '../controller/HomeController.php';
include "./autoload/autoload.php";
include "./header/header.php";
if ($_SESSION['id']) {
    header("location: index.php");
}
if ($_POST['submit']) {
    HomeController::create($_POST);
}
?>
    <div class="container mt-4 d-flex justify-content-center">
        <div class="w-50 text-center mt-4 ">
            <h1>Register</h1>
            <form class="p-4 border rounded " autocomplete="off" method="post">
                <input class="form-control mt-2" value=""
                       type="email" placeholder="email" name="email">
                <?php if (HomeController::$error['email']): ?>
                    <p class="alert alert-danger"><?php echo HomeController::$error['email'] ?> </p>
                <?php endif; ?>
                <input class="form-control mt-2"
                       value=""
                       type="text" placeholder="name" name="name">
                <?php if (HomeController::$error['name']): ?>
                    <p class="alert alert-danger"><?php echo HomeController::$error['name'] ?> </p>
                <?php endif; ?>
                <input class="form-control mt-2"
                       value=""
                       type="password" placeholder="password" name="password">
                <input class="form-control mt-2"
                       value=""
                       type="password" placeholder="Confirm Password" name="confirmPassword">
                <?php if (HomeController::$error['password']): ?>
                    <p class="alert alert-danger"><?php echo HomeController::$error['password'] ?> </p>
                <?php endif; ?>
                <input class="btn  btn-success mt-2" type="submit" name="submit">

            </form>
        </div>


    </div>
<?php
include "./footer/footer.php";
?>