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
            $addMember->closeCursor();  
        } 

        public function getMember($username) {
            $db = $this->dbConnect();
            $members = $db->prepare("SELECT id, username, password FROM members WHERE username = :username");
            $resp = $members->execute(array(
                'username' => $username
            ));
            if(!$resp) {
                throw new PDOException('Invalid username or password!');
            }
            return $members->fetch();
        }
    }

