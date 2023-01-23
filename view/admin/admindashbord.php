
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
            rel="stylesheet"
    />

    <title>Document</title>
</head>
<body>
<div>

</div>
<div class="container mt-4 d-flex justify-content-center">
    <div>
        <!--    modal create    -->
        <div class="modal fade" id="exampleModalc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="p-4" autocomplete="off" method="post">
                            <input class="form-control mt-2"
                                   type="email" placeholder="Email" name="email">
                            <input class="form-control mt-2"
                                   value=""
                                   type="text" placeholder="name" name="name">
                            <input class="form-control mt-2"
                                   value=""
                                   type="password" placeholder="password" name="password">

                            <select name="role" class="form-select" aria-label="Default select example">
                                <option disabled selected>Role Users</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="create_user" class="btn btn-primary" value="Save User">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalc">Create
            User
        </button>
        <!--    end modal  create  -->
        <button type="button" class="btn btn-link"><a href="../logout.php">logout</a></button>
        <!-- Modal del -->
        <div class="modal fade" id="exampleModald" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Delete already sent user?
                    </div>
                    <form action="" autocomplete="off" method="POST">
                        <div class="modal-footer">
                            <input type="text">
                            <input id="deluser" type="hidden" name="hiddendel" value="">
                            <input type="submit" name="submit" value="Delete" class="btn btn-primary">
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
                </form>

            </div>
        </div>
        <!--   end modal del     -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" autocomplete="off" action="">
                    <div class="modal-body">

                        <input id="email" class=" email form-control mt-2"
                               type="email" name="email">
                        <input id="name" class=" name form-control mt-2"
                               type="text" name="name">
                        <input id="pass" class=" pass form-control mt-2"
                               type="password" name="password">
                        <label for="role"> Role User</label>
                        <select name="role" class="form-select" aria-label="Default select example">
                            <option disabled selected>Role Users</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <input id="hidden" type="hidden" name="hidden" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="updateUser" name="update_user" value="Save changes"
                               class=" update_user btn btn-primary">
                        <input type="submit" name="close" value="close" class="btn btn-secondary"
                               data-bs-dismiss="modal">
                    </div>
                </form>

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
                <td class="border d-flex justify-content-center">
                    <button onclick="getId(<?php echo $user['id'] ?>)"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-warning">Update
                    </button>
                    <button type='submit' data-bs-toggle="modal" data-bs-target="#exampleModald"
                            onclick="getdelId(<?php echo $user['id'] ?>)" class="btn btn-danger"
                            value="Delete">DELETE
                    </button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script type='text/javascript' src='/public/script.js'></script>
</script>
</body>
</html>
