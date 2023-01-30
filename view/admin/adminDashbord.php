<?php

namespace view;
require "../header/header.php";
include $_SERVER['DOCUMENT_ROOT'] . '/controller/AdminController.php';
$admin = new \AdminController();
$users = $admin->getUser();
if ($_POST['createUser']) {
    $admin->createUser($_POST);
}
if ($_POST['Update']) {

    $admin->update($_POST);
}


?>
    <!-- Modal Create -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-4 border rounded " autocomplete="off" method="post">
                        <input class="form-control mt-2" value=""
                               type="email" placeholder="email" name="email">
                        <input class="form-control mt-2"
                               value=""
                               type="text" placeholder="name" name="name">
                        <input class="form-control mt-2"
                               value=""
                               type="password" placeholder="password" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="createUser" class="btn btn-primary" value="Save changes">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--end Modal Create-->
    <div class="modal fade" id="exampleModalUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                </div>
                <div class="modal-body">
                    <form class="p-4 border rounded " autocomplete="off" method="post">
                        <input class="form-control mt-2" value=""
                               type="email" placeholder="email" name="email">
                        <input class="form-control mt-2"
                               value=""
                               type="text" placeholder="name" name="name">
                        <input class="form-control mt-2"
                               value=""
                               type="password" placeholder="password" name="password">
                        <select name="role" class="form-select mt-2" aria-label="Default select example">
                            <option selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <input type="hidden" id="hidden" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="Update" class="btn btn-primary" value="Save changes">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--end Modal Update-->
    <div class="container mt-3">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success ">Create</button>
        <table class="table ">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Handled</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <th scope="row"><?php echo $user['id'] ?></th>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td class="d-flex">
                    <button onclick="getId(<?php echo $user['id'] ?>)" data-bs-toggle="modal"
                            data-bs-target="#exampleModalUp" class="btn btn-warning">Update
                    </button>
                </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
include "../footer/footer.php";