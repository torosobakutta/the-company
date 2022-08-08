<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50 ">
        <form action="../actions/register.php" method="post" class="border rounded-2 my-5 p-4">
            <h1 class="display-6 text-uppercase">resister</h1>

            <label for="first-name" class="form-label" >First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control mb-2">

            <label for="last-name" class="form-label" >Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control mb-2">

            <label for="username" class="form-label fw-bold" >User Name</label>
            <input type="text" name="username" id="username" class="form-control mb-2">

            <label for="password" class="form-label" >Password</label>
            <input type="password" name="password" id="password" class="form-control mb-4">

            <input type="submit" value="Register" class="btn btn-success w-100">
            <p class=" text-center">
                Resistered already? <a href="index.php">Log in</a>.
            </p>



            
        </form>
    </div>



    
</body>
</html>