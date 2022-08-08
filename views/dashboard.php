<?php

include '../classes/User.php';
session_start();

$u = new User();
$users = $u->getUsers();
?>



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

<!-- nav bar [get bootstrapからnavで検索→ navbar w/textをリンクコピー] -->

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
            <h1 class="display-6">User List</h1>

            <table class="table">
                <thead class="table-secondary">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name </th>
                    <th>User Name</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    #下記whileでroopさせて情報表示させる
                    while($row = $users->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $row['id']?> </td>
                        <td><?= $row['first_name']?></td>
                        <td><?= $row['last_name']?></td>
                        <td><?= $row['username']?></td>
                        <td>
                            <!-- ペンシルアイコン＝リンク（edit-user.phpのpageへ飛ぶ）
                            「php?id=」の「？」・・ 意味：？より先にリンク情報を送りますよ、というサイン。
                             間違いのミススペルではない、ちゃんと意味がある
                            リンク先作る時には必ず「id」をつける-->
                            <a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>

                            <!-- trash icon =安全のためにデータベースから消すようにするのでaでなくbuttonにしてる -->
                            <form action="../actions/delete.php" method="post" class="d-inline">
                                <input type="hidden" name="user_id" value="<?= $row['id']?>">
                                <!-- #hiddenにしてあるので隠れる のちにdelateされるようになる -->
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?> <!-- # end of while  -->
                </tbody>

            </table>

        </div>
    </div>    
</div>
</body>
</html>