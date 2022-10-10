<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form action="../actions/login.php" method="post" class="w-100 border rounded-2 my-5 p-3">
                    <h1 class="display-6 text-uppercase text-center">Login</h1>

                    <input type="text" name="username" id="" class="form-control mb-3" placeholder="USERNAME">

                    <input type="password" name="password" id="" class="form-control mb-4" placeholder="PASSWORD">

                    <button type="submit" class="btn btn-primary mb-3 d-block w-100">Log in</button>

                    <p class="text-center"><a href="register.php" class="text-decoration-none">Create account</a></p>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>