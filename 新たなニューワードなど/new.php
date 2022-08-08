8/5
Question

<form action="" method="post" class="d-inline">
    →d-inline 。。display inline の略
    省略form:post⇨　 ROW1のような表記に

<input type="submit" value="Save" class="btn btn-warning me-2">
省略形書き方　input:btn.btn-warning.  .で繋いでいく

<a href="" class="btn btn-secoundary"></a>
省略形　a.btn.btn-secondary



<button type="submit">
    省略　button:submit

<a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-outline-warning btn-sm me-1"><i class="fa-solid fa-pencil"></i></a>
リンク先作る時には必ず「id」をつける
「php?id=<」・・「php?id=」の「？」・・ 意味：？より先にリンク情報を送りますよ、というサイン。構文
　間違いのミススペルではない、ちゃんと意味がある


8/8
requireとincludeの違い
requireファンクション使わなくても

$tmp_name = $_FILES['photo']['tmp_name']; uploadphoto.phpない
#$_file...associative array 


