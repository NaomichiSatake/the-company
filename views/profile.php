<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

    $u = new User;
    $user = $u->getUser($_SESSION['user_id']);
    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="../actions/uploadPhoto.php" method = "post" class = "card" enctype = "multipart/form-data">
                    <div class="card-header">
                        <img src="../images/<?= $user['photo'] ?>" alt="">
                    </div>

                    <div class="card-body">
                        <label for="photo" class="form-label">Choose Photo</label>
                        <input type="file" name="photo" id="photo" class = "form-control mb-3">

                        <button type = "submit" class = "btn btn-outline-secondary">Upload Photo</button>
                    </div>

                    <div class="card-footer border-0">
                        <p class="h4"><?= $user['first_name']." ".$user['last_name'] ?></p>
                        <p class="h-5"><?= $_SESSION['username'] ?></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>