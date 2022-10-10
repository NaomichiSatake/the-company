<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php session_start(); ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-4">
        <a href="dashboard.php" class="navbar-brand text-light">
            <h1 class="h5">The Company</h1>
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="profile.php" class="text-muted text-decoration-none me-3"><?= $_SESSION['username'] ?></a></li>
            <li class="nav-item"><a href="../actions/logout.php" class="text-danger text-decoration-none">Log out</a></li>
        </ul>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10">

                <h2 class="h5">User List</h2>
                <table class="table">
                    <thead class="table-secondary text-dark">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </thead>

                    <tbody>
                        <?php
                        include "../classes/User.php";

                        $u = new User;
                        $all_users = $u->getUsers();

                        while($user = $all_users->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['first_name'] ?></td>
                            <td><?= $user['last_name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td>
                                <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn btn-outline-warning btn-sm me-2"><i class="fa-solid fa-pencil"></i></a>
                                <?php
                                if($_SESSION['user_id'] != $user['id']){
                                ?>
                                <form action="../actions/deleteUser.php" method="post" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>