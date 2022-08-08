<?php

include 'Database.php';

class User extends Database {

    public function createUser($first_name, $last_name, $username, $password){
        $sql = "INSERT INTO users(first_name, last_name, username, `password`)
        VALUES('$first_name', '$last_name', '$username' , '$password')"; 
        # users()内のpasswordだけ’’してるのは間違い防止の為（’’しないとsqlのコードとして
        # 認識される（sql内にpasswordという言語があるため)

        if($this->conn->query($sql)){  #quey..("sql)にデータ送っての意味
            header("location: ../views/index.php"); #..はファイルを読み出しての意味
            exit;

         }else{
             die('Error adding user :' . $this->conn->error);
        } #この「error 」・・queryに対してエラーがあった場合と言っている
    } # end p f createUser()


public function login($username, $password){
    $sql = "SELECT * FROM users where username='$username'";

    //find user in database
    if($result = $this->conn->query($sql)){
        //if query is ok, check if user is found
        if($result->num_rows == 1){

            $user_data = $result->fetch_assoc();

            //check password
            if(password_verify($password, $user_data['password'] )){
                //log in (save SESSION variables)
                #セッション変数・・、サーバー上に「ユーザー専用のデータの保管領域」を確保する仕組み
                #データを引き渡す方法としては、HTMLの「hidden」タグを使う方法があるが一時的なもの
                #データ保持期間による使い分け
                #短期　短い画面遷移間　hidden
                #中期　ユーザー操作中だけ保持したい場合　セッション変数
                #長期　永続的に保持　　データベース

                session_start(); #下記built in function 使うときはこれ書く
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];

                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Incorrect password");
            }

        }else{
            die("User not found");
        }

    }else{
        die("Error retrieving user: ".$this->conn->error);
    }
}

public function getUsers(){
    $sql = "SELECT * FROM users";

    if($result = $this->conn->query($sql)){
        return $result;
    }else{
        die("Error retrieving users: ".$this->conn->error);
    }
}

public function getUser($id){
    $sql = "SELECT * FROM users WHERE id=$id";

    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc(); //first row from the result
    }else{
        die("Error retrieving user: ".$this->conn->error);
    }
}

#editページはここ
public function updateUser($first_name , $last_name , $username , $id){
    $sql = "UPDATE users set
            first_name = '$first_name',
            last_name = '$last_name',
            username = '$username'
            WHERE id = $id ";

    #実行する↓
    if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");  #headerにリダイレクトする
        exit;
    }else{
        die("Error updating user: ". $this->conn->error);#エラーになった場合これ

    }

} #end pf updateUser

#deleteしたい時
public function deleteUser($id){
    $sql = "DELETE FROM users WHERE id = $id";


    if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");
        exit;
    }else{
        die("Error deleting user: ". $this->conn->error);#エラーになった場合これ
    }
} #3nd of deleteuser


#UPLOAD PHOTO入れるとき
public function uploadPhoto($id, $filename, $tmp_name){
    $sql = "UPDATE users SET
            photo = '$filename'
            WHERE id = $id";

    #上のを実行する
    if($this->conn->query($sql)){
        $destination = "../images/$filename";
        #ディステンーションを作ったらそれをアップロードさせる

        if(move_uploaded_file($tmp_name, $destination)){
            header("location: ../views/profile.php");
            exit;
        }else{
            die("Error moving file");
        }
        }else{
            die("Error updating photo: " . $this->conn->error);
        
    } #end if sql
    



}


}# end class User extends Database