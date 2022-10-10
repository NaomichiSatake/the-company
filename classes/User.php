<?php

include "Database.php";

class User extends Database {

    public function register($first_name, $last_name, $username, $password){
        $sql = "INSERT INTO users (first_name, last_name, username, password)
                values('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views"); //go to another page (views/index.php)
            exit;
        }else{
            die("Error registering user: ".$this->conn->error);
        }        
    }

    public function login($username, $password){
        //find the user in the database
        $sql ="SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){ //if user is found
            //check if the password is correct
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){ //login password vs database password

                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Incorrect password");
            }
        }else{
            die("User not found");
        }
        
    }

    public function getUsers(){
        $sql = "SELECT id, first_name, last_name, username FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving users: ".$this->conn->error);
        }
    }

    public function getUser($id){
        $sql = "SELECT id, first_name, last_name, username, photo FROM users 
                WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc(); //return one row
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    public function editUser($id, $f_name, $l_name, $username){
        $sql = "UPDATE users SET first_name = '$f_name', last_name = '$l_name', username = '$username' WHERE id = $id";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }

    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = $id";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }

    public function uploadPhoto($id, $photo_name, $tmp_name){
        //save the photo_name into the data base
        $sql = "UPDATE users SET photo= '$photo_name' WHERE id = $id";

        if($this->conn->query($sql)){
            //move the actual from temporary storage to images folder
            $destination = "../images/$photo_name";

            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Cannot move file");
            }
        }else{
            die("Error updating photo: ".$this->error->conn);
        }
    }
}