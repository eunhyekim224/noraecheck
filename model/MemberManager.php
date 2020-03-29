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
            $members = $this->_db->prepare("SELECT id, username, password FROM members WHERE username = :username");
            $members->bindParam(':username',$username,PDO::PARAM_STR);
            $resp = $members->execute();
            if(!$resp) {
                throw new PDOException('Invalid username or password!');
            }
            return $members->fetch();
        }
    }

