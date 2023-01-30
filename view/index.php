<?php
namespace view;
require "./header/header.php";
include '../controller/HomeController.php';
session_start();
$_SESSION['page'] = 'Home';
use user as user;
$user = user::getWhere(['id'=>$_SESSION['id']]);
?>
<?php if (!is_null($user)): ?>
<p class="text-center"><?php echo 'hello '.'  ' .ucfirst( $user['name']); ?></p>
<?php
endif
?>

<?php

include "./footer/footer.php";





