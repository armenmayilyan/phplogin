<?php
include './header/header.php';
if($_POST['submit']){
    var_dump($_POST);
}
?>
<div class="container mt-4 d-flex justify-content-center">
    <div class="w-50 text-center mt-4 ">
        <h1>Create Post</h1>
        <form class="p-4" autocomplete="off" method="post">
            <input class="form-control mt-2" value=""
                   type="text" name="name">
            <input class="form-control mt-2"
                   value=""
                   type="text" name="descripton">
            <input class="form-control mt-2"
                   value=""
                   type="number" name="price">
            <input class="form-control mt-2"
                   value=""
                   type="file" name="image">
            <input class="btn  btn-success mt-2" type="submit" name="submit">

        </form>
    </div>


</div>
<?php
include './footer/footer.php'
?>
