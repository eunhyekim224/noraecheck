<?php
    require_once("./model/MemberManager.php");
    require_once("./model/PlaylistManager.php");
    require_once("./model/SongManager.php");
    require_once("./model/challengeManager.php");

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
           
            if(!$usernameInUse){
                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#",$email)){
                    if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#",$password)) {
                        if ($username AND $password == $passwordConf){
                            $status = $memberManager->addMember($email,$username,$password);
                            header("location:index.php?action=login&success=1");
                        } else if ($password != $passwordConf){
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

    function showSongs($playlistId) {
        $playlistManager = new PlaylistManager();
        $songManager = new SongManager();
        $mainPlaylist = $playlistManager->getMainPlaylist($playlistId);
        $songDisplay = $songManager->getSongs($playlistId);
        $displayMode = 'songs';
        require("view/home.php");
    }

    function editBrandCode($playlistId,$songId,$tjCode,$kumyoungCode,$page,$round,$scoreOption,$possibleScore) {
        $songManager = new SongManager();
        $editBrandCodes = $songManager->editBrandCodes($songId,$tjCode,$kumyoungCode);
        if($page == 'playlistSongs'){
            header('Location: index.php?action=showMySongs&playlistId='.$playlistId);
        } else if($page == 'challengeInProgress'){
            header('Location: index.php?action=challengeInProgress&score='.$possibleScore.'&round='.$round .'&scoreOption=' .$scoreOption);
        }
        
    }

    function editPlaylist($newPlaylistName,$playlistId) {
        $playlistManager = new PlaylistManager();
        $editPlaylist = $playlistManager->editPlaylistName($newPlaylistName,$playlistId);
        header('Location: index.php?action=showMySongs&playlistId='.$playlistId);
    }

    function deletePlaylist($playlistId, $memberId) {
        $playlistManager = new PlaylistManager();
        $playlistManager->deletePlaylist($playlistId);
        header('Location: index.php?action=showMyList');
    }

    function deleteSong($songId) {
        $songManager = new SongManager();
        $playlistId = $songManager->deleteSong($songId);
        header('Location: index.php?action=showMySongs&playlistId='.$playlistId);
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
        $songAddManager = new SongManager();
        $songAdd = $songAddManager->addSong($newAddPlaylist, $singer, $song, $tj, $kumyoung);
        header('Location: index.php?action=search');
    }

    function showChallenge($memberId) {
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->getAllPlaylists($memberId);
        for ($i = 0;$i < count($playlists); $i++){
            if($playlists[$i]['songCount'] == 0){
                unset($playlists[$i]);
            }
        }
        $displayMode = 'challengeSetUp';
        require("view/home.php");
    }
    function challengeInProgress($memberId,$round,$scoreOption,$score) {
        $challengeInProgressManager = new ChallengeManager();
        $getChallenge = $challengeInProgressManager->getChallenge($memberId);
        $scoreOpt = $scoreOption;
        $displayMode = 'challengeInProgress';
        require("view/home.php");
    }

    function updateScore($memberId,$score,$songId,$round,$scoreOption){
        $updateScore = new ChallengeManager();
        $updatedScore = $updateScore->updateScore($memberId,$score,$songId);
        header('Location: index.php?action=challengeInProgress&score='.$updatedScore.'&round='.$round .'&scoreOption=' .$scoreOption);
    }

    function endChallenge($memberId,$scoreOption) {
        $endChallenge = new ChallengeManager();
        $trophy = $endChallenge->endChallenge($memberId);
        $displayMode = 'endChallenge';
        require("view/home.php");
    }

    function deleteChallenge($memberId) {
        $deleteChallenge = new ChallengeManager();
        $deleteChallenge->deleteChallenge($memberId);
        header('Location: index.php?action=showMyList');
    }
     
    function newChallenge ($memberId) {
        $deleteChallenge = new ChallengeManager();
        $deleteChallenge->deleteChallenge($memberId);
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->getAllPlaylists($memberId);
        for ($i = 0;$i < count($playlists); $i++){
            if($playlists[$i]['songCount'] == 0){
                unset($playlists[$i]);
            }
        }
        $displayMode = 'challengeSetUp';
        require("view/home.php");
    }

    function showProfile($memberId,$userName) {
        $profileManager = new MemberManager();
        $currentProfile = $profileManager->getMember($userName);
        $displayMode = 'profile';
        require("view/home.php");
    }

    function editProfile($memberId,$oldUsername,$newUsername,$email,$oldPwd,$newPwd,$newpwdConf){
        $memberManager = new MemberManager();
        $errors = array(
            "contextUp" => "editProfile"
        );
        
        $currentProfile = $memberManager->getMember($oldUsername);

        if($newUsername && $email && $oldPwd){
            if (password_verify($oldPwd, $currentProfile['password'])){
                if($currentProfile['username'] != $newUsername){
                    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#",$email)){
                        if ($newPwd && $newpwdConf) {
                            if(preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#",$newPwd)) {
                                if ($newUsername && $newPwd && $newpwdConf && $newPwd == $newpwdConf){
                                    $status = $memberManager->editMember($memberId,$email,$newUsername,$newPwd);
                                    header("Location: index.php?success=1");
                                } else if ($newPwd && $newpwdConf && $newPwd != $newpwdConf){
                                    $errors['pwdConf'] = 'password does not match';
                                }
                            } else {
                                $errors['pwd'] = 'please include 8 characters, upper/lower case letters, and digits';
                            }   
                        } else {
                            $status = $memberManager->editMember($memberId,$email,$newUsername,$oldPwd);
                            header("Location: index.php?success=1");
                        }
                    } else {
                        $errors['email'] = 'incorrect email'; 
                    }
                } else{
                    $errors['loginNew'] = 'username taken'; 
                }
            } else {
                $errors['oldPwdConf'] = 'incorrect password';
            }
        } else {
            $errors['blanks'] = 'fill in the blanks';
        }
        $displayMode = 'profile';
        require("view/home.php");
    } 

    function deleteProfile($singer,$score) {
        $memberManager = new MemberManager();
        $deleteProfile = $memberManager->deleteProfile($memberId);
        header("Location: index.php?success=1");
    }

    function insertChallengeInfo($memberId,$allSingers,$chalPlaylistOptions,$chalPlaylistId,$noOfSongs,$scoreOption) {
        echo '<strong>List of all singers: </strong>'.$allSingers;
        $singersArray = explode(',',$allSingers);
        $playlistsArray = array();
        $playlistManager = new PlaylistManager();
        
        if ($chalPlaylistOptions === 'onePlaylist') {
            $playlistsDb = array();
            array_push ($playlistsDb, $playlistManager->getMainPlaylist($chalPlaylistId));
        } else{
            $playlistsDb = $playlistManager->getAllPlaylists($memberId);
        }
        
        foreach ($playlistsDb as $playlists) {
            array_push($playlistsArray, $playlists['playlistId']);
        }

        $songsArray = array();
        $songManager = new SongManager();
        $songsDb = array();
        for ($i=0, $c=count($playlistsArray); $i<$c; $i++) {
            $songsDb = array_merge($songsDb, $songManager->getSongs($playlistsArray[$i]));
        }

        foreach ($songsDb as $song) {
            array_push($songsArray, $song["songId"]);
        }
        shuffle($songsArray);

        if ($chalPlaylistOptions === 'allPlaylists'){
            if($noOfSongs <= count($songsArray)) {
                $songsArray = array_slice($songsArray,0,$noOfSongs);
            } 
        }
        
        $countSinger = count($singersArray);
        $increment = 0;
        $challengeManager = new ChallengeManager();
        $challengeManager->deleteChallenge($memberId);
        foreach ($songsArray as $i=>$song){
            $challengeManager->insertSingerSongs($memberId,$singersArray[$increment],$song, null);
            if($increment === count($singersArray)-1){
                $increment = 0;
            } else {
                $increment++;
            }
        }

        header("Location: index.php?action=challengeInProgress&scoreOption=".$scoreOption);
    }

    function logout(){
        session_destroy();
        header("Location:index.php");
    }
    


