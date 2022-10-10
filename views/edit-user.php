<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

    <?php

    include "../classes/User.php";

    $user_id = $_GET['id'];
    $u = new User;
    $user = $u->getUser($user_id);

    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2 class="display-6 text-uppercase text-center">Edit User</h2>

                <form action="../actions/editUser.php" method="post">
                    <input type="hidden" name = "user_id" value = "<?= $user_id?>">    

                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first-name" value = "<?= $user['first_name'] ?>" class="form-control mb-2">

                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last-name" value = "<?= $user['last_name'] ?>"  class="form-control mb-2">

                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" id="username" value = "<?= $user['username'] ?>" class="form-control mb-4">

                    <button type="submit" class="btn btn-warning">Save</button>
                    <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>