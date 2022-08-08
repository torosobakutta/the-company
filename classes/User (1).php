<?php

include 'Database.php';

class User extends Database {
    
    public function createUser($first_name, $last_name, $username, $password){
        $sql = "INSERT INTO users (first_name,last_name,username,`password`) 
                values('$first_name' , '$last_name' , '$username' , '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/index.php");
            exit;

        }else{
            die('Error adding user: '.$this->conn->error);
        }
    }

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

                    session_start();

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

}