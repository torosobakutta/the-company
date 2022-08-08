<?php

include '../classes/User.php';

session_start();#これマスト　入れないと下記作動しない2つ下のgetuser()内に$idを入れるに必要
$u = new User;
$user = $u->getUser($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark"> <!--オリジナルはbg-light 画面に応じてアレンジした -->
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">The-Company</a>
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
       <a href="profile.php" class="text-muted text-decoration-none me-2"><?= $_SESSION['username']?></a>
       <a href="../actions/logout.php" class="text-danger text-decoration-none">Log Out</a>
      </span>
    </div>
  </div>
</nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="ard-header">
                        <img src="../images/<?=
                        $user['photo']?>" alt="">
                        これで写真の表示ができる　ないとsaveだけされるだけ
                    </div>

                    <div class="card-body">

                        <form action="../actions/uploadPhoto.php" method="post" enctype="multipart/form-data">
                            <label for="photo" class="form-label">Choose Photos</label>
                            <input type="file" name="photo" id="photo"
                            class="btn btn-outline-secondary mb-4 ">
                            <input type="submit" value="Upload Photo"
                            class="btn btn-outline-secondary mb-4">
                        </form>

                        <p class="h4"> <?=$user['first_name']. ' '.$user['last_name'] ?></p> 
                        <!-- ''内はスペースになる名前と名字の間 ." "にしても可能 -->
                        <p class="h6"><?= $user['username'] ?></p>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>