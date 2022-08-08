<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form action="../actions/login.php" method="post" class="border rounded-2 p-4 my-5 w-25 mx-auto">
<!-- form actionにlogin.php入れることでリンクに飛ぶ -->
        <h1 class="display-6 text-uppercase text-center">Login</h1>
        <input type="text" name="username" id="username" class="form-control mb-3" placeholder="USERNAME">
        <input type="text" name="password" id="password" class="form-control mb-3" placeholder="PASSWORD">

        <input type="submit" value="Log in" class="btn btn-primary w-100 mb-3">
        <p class="text-center">
            <a href="register.php" class="text-decoration-none">Create account</a>
            <!-- register.phpは同じviewフォルダー内なので../入力不要 -->
        </p>
    </form>    
</body>
</html>