<?php
    require_once("./model/MemberManager.php");
    require_once("./model/PlaylistManager.php");
    require_once("./model/SongManager.php");

    // use \Wcoding\Noraecheck\Model\MemberManager;
    // use \Wcoding\Noraecheck\Model\PlaylistManager;

    function showLandingPage($error,$status) {
        require("view/landing.php");
    }
    
    function signUp($email, $username, $password, $passwordConf) {
        $memberManager = new MemberManager();
        $errors = array(
            "contextUp" => "signUp"
        );
        
        $usernameInUse = $memberManager->getMember($username);

        if($username AND $password AND $passwordConf AND $email){
            // $usernameInUse = $memberManager->getMember($username);
            if(!$usernameInUse){
                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#",$email)){
                    if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#",$password)) {
                        if ($username AND $password == $passwordConf){
                            $status = $memberManager->addMember($email,$username,$password);
                            header("location:index.php?action=login&success=1");
                        } else if ($password != $passwordCheck){
                            $errors['pwdConf'] = 'password does not match';
                        } 
                    } else {
                        $errors['pwd'] = 'please include 8 characters, upper/lower case letters, and digits';
                    }
                } else {
                    $errors['email'] = 'incorrect email';
                    
                }
            } else{
                $errors['loginNew'] = 'username taken';
                
            }
        } else {
            // require("view/landingSignup.php");
            // require("view/landingSignIn.php"); 
            require("view/landing.php");
        }
        require("view/landing.php");  
    }

    function signIn($username,$password) {
        $loginManager = new MemberManager();
        $errors = array(
            "context" => "signIn"
        );
       
        $userInfo = $loginManager->getMember($username);
        //getMember confirms userId, password is checked below
        if($userInfo){
            if (password_verify($password, $userInfo['password'])){
                    $_SESSION['username'] = $userInfo['username'];
                    $_SESSION['memberId'] = $userInfo['id'];
                    header('Location: index.php?action=showMyList');
            } else {
                $errors['password'] = 'incorrect password';
            }
        } else {
            $errors['username'] = 'there are no accounts with that ID';
        }
        require("view/landing.php");
    }

    function makePlaylist($memberId, $name) {
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->addPlaylist($memberId, $name);
        header('Location: index.php?action=showMyList');
    }

    function showAllPlaylists($memberId) {
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->getAllPlaylists($memberId);
        $displayMode = 'playlists';
        require("view/home.php");    
    }

    function showSongs($playlistName,$playlistId) {
        $songManager = new SongManager();
        $songDisplay = $songManager->getSongs($playlistId);
        $displayMode = 'songs';
        require("view/home.php");
    }

    function deletePlaylist($playlistId, $memberId) {
        $playlistManager = new PlaylistManager();
        $playlistManager->deletePlaylist($playlistId);
        header('Location: index.php?action=showMyList');
    }
    function search($memberId,$searchCache,$categoryCache) {
        $playlistAddManager = new PlaylistManager();
        $playlistsAdd = $playlistAddManager->getAllPlaylists($memberId);
        $modalDisplay = 'off';
        require("view/search.php");
    }
    function searchModal($song,$singer,$tj,$kumyoung,$searchCache,$categoryCache,$memberId,$playlistId) {
        $playlistAddManager = new PlaylistManager();
        $playlistsAdd = $playlistAddManager->getAllPlaylists($memberId);
        $modalDisplay = 'on';
        require("view/search.php");
    }
    function addToPlaylist($playlistId,$singer,$song,$tj,$kumyoung) {
        $songAddManager = new SongManager();
        $songAdd = $songAddManager->addSong($playlistId, $singer, $song, $tj, $kumyoung);
        header('Location: index.php?action=search');
    }

    function addSongToNewPlaylist($memberId,$playlistName,$singer,$song,$tj,$kumyoung) {
        $playlistAddManager = new PlaylistManager();
        $newAddPlaylist = $playlistAddManager->addPlaylist($memberId, $playlistName);
        $getPlaylist = $playlistAddManager->getPlaylist($memberId, $playlistName);
        $gotPlaylist = $getPlaylist->fetch();
        $newPlaylistId = $gotPlaylist['playlistId'];
        $songAddManager = new SongManager();
        echo $playlistName .$singer .$song .$tj .$kumyoung;
        $songAdd = $songAddManager->addSong($newPlaylistId, $singer, $song, $tj, $kumyoung);
        header('Location: index.php?action=search');
    }
    


