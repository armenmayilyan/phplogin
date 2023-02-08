<?php
include '../controller/HomeController.php';
include "./header/header.php";
use HomeController as register;
if($_SESSION['page'] != 'Register'){
    header("Refresh:0");
    $_SESSION['page'] = 'Register';
}
if (isset($_SESSION['id'])) {
    header("location: index.php");
}
if (isset($_POST['submit'])) {
    register::create($_POST);
}
?>
        <div class="container mt-4 d-flex justify-content-center">
        <div class="w-50 text-center mt-4 ">
            <h1>Register</h1>
            <form class="p-4  border rounded " autocomplete="off" method="post">
                <input class="form-control mt-2" value=""
                       type="email" placeholder="email" name="email">
                <?php if (isset(register::$error['email'])): ?>
                    <p class="alert alert-danger"><?php echo register::$error['email'] ?> </p>
                <?php endif; ?>
                <input class="form-control mt-2"
                       value=""
                       type="text" placeholder="name" name="name">
                <?php if (isset(register::$error['name'])): ?>
                    <p class="alert alert-danger"><?php echo register::$error['name'] ?> </p>
                <?php endif; ?>
                <input class="form-control mt-2"
                       value=""
                       type="password" placeholder="password" name="password">
                <input class="form-control mt-2"
                       value=""
                       type="password" placeholder="Confirm Password" name="confirmPassword">
                <?php if (isset(register::$error['password'])): ?>
                    <p class="alert alert-danger"><?php echo register::$error['password'] ?> </p>
                <?php endif; ?>
                <input class="btn  btn-success mt-2" type="submit" name="submit">
            </form>
        </div>


    </div>
<?php
include "./footer/footer.php";
?>