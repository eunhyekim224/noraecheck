<?php
    require_once("./model/MemberManager.php");
    require_once("./model/PlaylistManager.php");

    // use \Wcoding\Noraecheck\Model\MemberManager;
    // use \Wcoding\Noraecheck\Model\PlaylistManager;

    function showLandingPage($error,$status) {
        require("view/landing.php");
    }
    
    function signUp($email, $username, $password, $passwordConf,$error) {
        $memberManager = new MemberManager;
        if($username AND $password AND $passwordConf AND $email){
            $usernameInUse = $memberManager->getMember($username);
            if(!$usernameInUse){
                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#",$email)){
                    if ($username AND $password == $passwordConf){
                        $status = $memberManager->addMember($email,$username,$password);
                        header("location:index.php?action=login&success=1");
                    } else if ($password != $passwordCheck){
                        header('Location: index.php?action=register&error=passError');
                    }
                } else {
                    header('Location: index.php?action=register&error=mailError');
                }
            } else{
                header('Location: index.php?action=register&error=logOld');
            }
        } else {
            require("view/landingSignup.php");
        }  
    }

    function logIn($username,$password,$error,$status) {
        $loginManager = new MemberManager;
        if($username AND $password){
            $userInfo = $loginManager->getMember($username,$password);
            //getMember confirms userId, password is checked below
            if($userInfo){
                if (password_verify($password,$userInfo['password'])){
                        $_SESSION['username'] = $userInfo['username'];
                        header('Location: index.php?action=showMyList');
                } else {
                    $error = 'passError';
                    require("view/landing.php");
                }
            } else {
                $error = 'logError';
                require("view/landing.php");
            }
        }else{
            $error = 'missingField';
            require("view/landing.php");
        }
    }

    function makePlaylist($memberId, $name) {
        $playlistManager = new PlaylistManager;
        $playlists = $playlistManager->addPlaylist($memberId, $name);
        require("view/home.php");
    }

    function showAllPlaylists($username) {
        $playlistManager = new PlaylistManager;
        $playlists = $playlistManager->getAllPlaylists($username);
        require("view/home.php");
    }

    function showPlaylist($memberId, $name) {
        //getPlaylist
    }
    function search($username) {
        $playlistManager = new PlaylistManager;
        $playlists = $playlistManager->getAllPlaylists($username);
        require("view/search.php");
    }
    


