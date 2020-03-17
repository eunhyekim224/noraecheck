<?php
    require_once('model/Manager.php');

    /**
    * TODO: function to deleteMember (delete account)
    */

    class MemberManager extends Manager {
        public function addMember($email, $username, $password) {
            $db = $this->dbConnect();          
            $addMember = $db->prepare("INSERT INTO members(email, username, password) VALUES(:email, :username, :password)");
            $status = $addMember->execute(array(
                'email' => htmlspecialchars($email),
                'username' => htmlspecialchars($username),
                'password' =>  password_hash(htmlspecialchars($password), PASSWORD_DEFAULT)
            ));
            if (!$status) {
                throw new PDOException('Impossible to add the member!');
            }
            
        } //this wasn't working because password entered didn't match password hash. now it only selects where the passwords line up and then evaluates password in the controller
        public function getMember($username) {
            $db = $this->dbConnect();
            $members = $db->prepare("SELECT username, password FROM members WHERE username = :username");
            $resp = $members->execute(array(
                'username' => $username
            ));
            if(!$resp) {
                throw new PDOException('Invalid username or password!');
            }
            $memFetch = $members->fetch();
            return $memFetch;
        }
        


    }

