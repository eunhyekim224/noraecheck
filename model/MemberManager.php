<?php   
    require_once('model/Manager.php');


    
    class MemberManager extends Manager {

        function __construct() {
            parent::__construct();
        } 


        public function addMember($email, $username, $password) {
            $email = htmlspecialchars($email);
            $username = htmlspecialchars($username);
            $password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);       
            $addMember = $this->_db->prepare("INSERT INTO members(email, username, password) VALUES(:email, :username, :password)");
            $addMember->bindParam(':email',$email,PDO::PARAM_STR);
            $addMember->bindParam(':username',$username,PDO::PARAM_STR);
            $addMember->bindParam(':password',$password,PDO::PARAM_STR);
            $status = $addMember->execute();
            if (!$status) {
                throw new PDOException('Impossible to add the member!');
            }
            $addMember->closeCursor();  
        } 

        public function getMember($username) {
            $members = $this->_db->prepare("SELECT id, email, username, password FROM members WHERE username = :username");
            $members->bindParam(':username',$username,PDO::PARAM_STR);
            $resp = $members->execute();
            if(!$resp) {
                throw new PDOException('Invalid username or password!');
            }
            return $members->fetch();
        }

        public function editMember($memberId,$email,$newUsername,$newPwd) {
            $email = htmlspecialchars($email);
            $memberId = htmlspecialchars($memberId);
            $username = htmlspecialchars($newUsername);
            $password = password_hash(htmlspecialchars($newPwd), PASSWORD_DEFAULT);       
            $editMember = $this->_db->prepare("UPDATE members SET email = :email, username = :username, password = :pwd WHERE id = :memberId");
            $editMember->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $editMember->bindParam(':email',$email,PDO::PARAM_STR);
            $editMember->bindParam(':username',$username,PDO::PARAM_STR);
            $editMember->bindParam(':pwd',$password,PDO::PARAM_STR);
            $status = $editMember->execute();
            if (!$status) {
                throw new PDOException('Impossible to edit profile!');
            }
            $editMember->closeCursor();  
        }

        public function deleteProfile($memberId) {
            $member = $this->_db->prepare("DELETE FROM members WHERE id = :memberId");
            $member->bindParam(':memberId',$memberId,PDO::PARAM_INT);
            $resp = $member->execute();
            if(!$resp) {
                throw new PDOException('Invalid username or password!');
            }
            $member->closeCursor();
        }
    }

