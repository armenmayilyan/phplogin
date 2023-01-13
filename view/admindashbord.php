<?php
include "../model/user.php";

use User as user;

if ($_GET['id']) {
    return 'success';
}
$users = user::getAllUsers();

include './header/header.php';
if ($_POST['update_user']) {
    if ($_POST['role'] == 'on') {
        $role = 'admin';
    } else {
        $role = 'user';
    }
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'pass' => $_POST['password'],
        'role' => $role

    ];


}
?>
<div class="container mt-4 d-flex justify-content-center">
    <div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input id="email" class=" email form-control mt-2"
                               type="email" name="email">
                        <input id="name" class=" name form-control mt-2"
                               type="text" name="name">
                        <input id="pass" class=" pass form-control mt-2"
                               type="password" name="password">
                        <label for="role"> Role User</label>
                        <input id="role" type="checkbox" name="role">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update_user" value="Save changes" onclick="function saveUser() {
                       let email = document.getElementById('email').value
                       let name = document.getElementById('name').value
                       let pass = document.getElementById('pass').value

                       // formData.append('username', name);
                       // formData.append('username', email);
                       // formData.append('username', pass);
                       fetch('http://test.local/view/admindashbord.php',()=>{
                           console.log(123)
                       })
                        }
                        saveUser()" class=" update_user btn btn-primary"></button>
                        <!--                        <input type="submit" name="update_user" value="Save changes" onclick="saveUser()" class=" update_user btn btn-primary">-->
                        <input type="submit" name="close" value="close" class="btn btn-secondary"
                               data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr class="border">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">handler</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="border"><?php echo $user['id'] ?></td>
                    <td class="border"><?php echo $user['name'] ?></td>
                    <td class="border"><?php echo $user['email'] ?></td>
                    <td class="border">

                        <input type="submit" onclick="getId(<?php echo $user['id'] ?>)"
                               value="<?php echo $user['id'] ?>" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class="btn btn-warning">


                        <!--                        <a href="update.php?id='. $user['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>-->
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach ?>

            </tbody>
        </table>

    </div>


</div>
<?php
include './footer/footer.php'
?>
