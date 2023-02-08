<?php
require "./header/header.php";
include '../controller/HomeController.php';
use user as user;
if ($_SESSION['page'] != 'Home') {
    header("Refresh:0");
    $_SESSION['page'] = 'Home';
}
$user = user::getWhere(['table' => 'users'], ['id' => $_SESSION['id']]);
?>
<?php if (!is_null($user)): ?>
    <p class="text-center"><?php echo 'hello ' . '  ' . ucfirst($user['name']); ?></p>
<?php
endif
?>

<?php

include "./footer/footer.php";





