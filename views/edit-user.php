<?php

include '../classes/User.php';
session_start();

$u = new User();
$user = $u->getUser($_GET['id']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<!-- nav bar [get bootstrapからnavで検索→ navbar w/textをリンクコピー] -->

 <nav class="navbar navbar-expand-lg bg-dark"> <!--オリジナルはbg-light 画面に応じてアレンジした -->
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="dashboard.php">The-Company</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="ms-auto" id="navbarText">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul> -->
      <span class="navbar-text">
       <a href="" class="text-muted text-decoration-none me-2"><?= $_SESSION['username']?></a>
       <a href="../actions/logout.php" class="text-danger text-decoration-none">Log Out</a>
      </span>
    </div>
  </div>
</nav>
<div class="container my-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action= "../actions/update.php" method="post" class="my-5">
                <h1 class="display-6 text-uppercase">Edit User</h1>

                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" value="<?= $user['first_name'] ?>"id="first_name"
                class="form-control mb-2">

                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" value="<?= $user['last_name'] ?>" id="last-mame"
                class="form-control mb-2">

                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" id="username"
                class="form-control mb-3">

                <input type="hidden" name="user_id" value="<?= $user['id'] ?> "> 
                <!-- user.php の$user_id = $_POST['user_id'];とリンクしてる -->

                <input type="submit" value="Save" class="btn btn-warning me-2">
                <a href="dashboard.php" class="btn btn-secondary">Cancel</a>

            </form>
            


        </div>
    </div>    
</div>
</body>
</html>