<?php
session_start();
require("./controller/controller.php");
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    $memberId = isset($_SESSION['memberId']) ? $_SESSION['memberId'] : '';
    if(isset($_SESSION['memberId'])){
        if (isset($_REQUEST['action'])) {
            if ($action === 'showMyList') {
                showAllPlaylists($memberId); 
            } else if ($action === 'showMySongs') {
                $playlistId = isset($_GET['playlistId']) ? $_GET['playlistId'] : '';
                showSongs($playlistId); 
            } else if ($action === 'logout') {
                logout(); 
            } else if ($action === 'register') {
                $username = isset($_POST['loginNew']) ? $_POST['loginNew'] : '';
                $pass1 = isset($_POST['pwd']) ? $_POST['pwd'] : '';
                $pass2 = isset($_POST['pwdConf']) ? $_POST['pwdConf'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                signUp($email,$username,$pass1,$pass2);
            } else if ($action === 'login') {
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                signIn($username,$password);
            } else if ($action === 'newPlaylist') {
                $playlistName = isset($_POST['playlistName']) ? $_POST['playlistName'] : '';
                if (isset($memberId) &&  strlen(trim($playlistName)) === 0) {
                    showAllPlaylists($memberId);
                } else if (isset($memberId) && isset($playlistName) && strlen(trim($playlistName)) > 0) {
                    makePlaylist($_SESSION['memberId'], $_POST['playlistName']);
                } else {
                    throw new PDOException("issue with showAllPlaylists(username) - unable to fetch the playlists!");
                }
            } else if ($action === 'editPlaylist') {
                if (isset($_POST['newPlaylistName']) && isset($_POST['playlistId'])) {
                    editPlaylist(($_POST['newPlaylistName']), $_POST['playlistId']);
                }
            } else if ($action === 'deletePlaylist') {
                if (isset($_SESSION['memberId']) && isset($_SESSION['playlistId'])) {
                    deletePlaylist(($_SESSION['playlistId']), $_SESSION['memberId']);
                }
            } else if ($action === 'editBrandCode') {
                $page = isset($_POST['page']) ? $_POST['page'] : '';
                $round = isset($_POST['round']) ? $_POST['round'] : '';
                $playlistId = isset($_POST['playlistId']) ? $_POST['playlistId'] : '';
                $songId = isset($_POST['songId']) ? $_POST['songId'] : '';
                $tjCode = isset($_POST['tjCode']) ? $_POST['tjCode'] : '';
                $kumyoungCode = isset($_POST['kumyoungCode']) ? $_POST['kumyoungCode'] : '';
                $scoreOption = isset($_REQUEST['scoreOption']) ? $_REQUEST['scoreOption'] : '';
                $possibleScore = isset($_REQUEST['oldScore']) ? $_REQUEST['oldScore'] : '';
                if ($playlistId && $songId) {
                    editBrandCode($playlistId,$songId,$tjCode,$kumyoungCode,$page,$round,$scoreOption,$possibleScore);
                }  
            } else if ($action === 'deleteSong') {
                $songId = isset($_POST['songId']) ? $_POST['songId'] : '';
                if ($songId) {
                    deleteSong($songId);
                }
            } else if ($action === 'showProfile') {
                $userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                showProfile($memberId,$userName);
            } else if ($action === 'editProfile') {
                $oldUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                $newUsername = isset($_POST['newUsername']) ? $_POST['newUsername'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $oldPwd = isset($_POST['oldPwd']) ? $_POST['oldPwd'] : '';
                $newPwd = isset($_POST['newPwd']) ? $_POST['newPwd'] : '';
                $newpwdConf = isset($_POST['newpwdConf']) ? $_POST['newpwdConf'] : '';
                editProfile($memberId,$oldUsername,$newUsername,$email,$oldPwd,$newPwd,$newpwdConf);
            } else if ($action === 'deleteProfile') {
                deleteProfile($memberId);  
            } else if ($action === 'searchModal') {
                $song = isset($_REQUEST['hiddenSong']) ? $_REQUEST['hiddenSong'] : '';
                $singer = isset($_REQUEST['hiddenSinger']) ? $_REQUEST['hiddenSinger'] : '';
                $tj = isset($_REQUEST['hiddenTj']) ? $_REQUEST['hiddenTj'] : '';
                $kumyoung = isset($_REQUEST['hiddenKumyoung']) ? $_REQUEST['hiddenKumyoung'] : '';
                $playlistId = isset($_SESSION['playlistId']) ? $_SESSION['playlistId'] : '';
                $searchCache = isset($_REQUEST['searchCache']) ? $_REQUEST['searchCache'] : '';
                $categoryCache = isset($_REQUEST['categoryCache']) ? $_REQUEST['categoryCache'] : '';
                searchModal($song,$singer,$tj,$kumyoung,$searchCache,$categoryCache,$memberId,$playlistId);
            } else if ($action === 'addToPlaylist') {
                $playlistId = isset($_REQUEST['playlistId']) ? $_REQUEST['playlistId'] : '';
                $song = isset($_REQUEST['song']) ? $_REQUEST['song'] : '';
                $singer = isset($_REQUEST['singer']) ? $_REQUEST['singer'] : '';
                $tj = isset($_REQUEST['tj']) ? $_REQUEST['tj'] : '';
                $kumyoung = isset($_REQUEST['kumyoung']) ? $_REQUEST['kumyoung'] : '';
                addToPlaylist($playlistId,urldecode($singer),urldecode($song),$tj,$kumyoung);
            } else if ($action === 'addSongToNewPlaylist') {
                $playlistName = isset($_REQUEST['playlistName']) ? $_REQUEST['playlistName'] : '';
                $song = isset($_REQUEST['song']) ? $_REQUEST['song'] : '';
                $singer = isset($_REQUEST['singer']) ? $_REQUEST['singer'] : '';
                $tj = isset($_REQUEST['tj']) ? $_REQUEST['tj'] : '';
                $kumyoung = isset($_REQUEST['kumyoung']) ? $_REQUEST['kumyoung'] : '';
                if (isset($_SESSION['memberId']) && $playlistName) {
                    addSongToNewPlaylist($_SESSION['memberId'], $playlistName,urldecode($singer),urldecode($song),$tj,$kumyoung);
                }
                addToPlaylist($playlistId,urldecode($singer),urldecode($song),$tj,$kumyoung);
            } else if ($action === 'search') {
                $searchCache = isset($_REQUEST['searchCache']) ? $_REQUEST['searchCache'] : '';
                $categoryCache = isset($_REQUEST['categoryCache']) ? $_REQUEST['categoryCache'] : '';
                search($memberId,$searchCache,$categoryCache);     
            } else if ($action === 'showChallenge') {
                showChallenge($memberId);
            } else if ($action === 'challengeInProgress') {
                $round = isset($_REQUEST['round']) ? $_REQUEST['round'] : '0';
                $scoreOption = isset($_REQUEST['scoreOption']) ? $_REQUEST['scoreOption'] : '';
                $score = isset($_REQUEST['score']) ? $_REQUEST['score'] : '';
                challengeInProgress($memberId,$round,$scoreOption,$score);
            } else if ($action === 'updateScore') {
                $score = isset($_REQUEST['newScore']) ? $_REQUEST['newScore'] : '';
                $songId = isset($_REQUEST['songIdToUpdate']) ? $_REQUEST['songIdToUpdate'] : '';
                $round = isset($_REQUEST['round']) ? $_REQUEST['round'] : '';
                $scoreOption = isset($_REQUEST['scoreOption']) ? $_REQUEST['scoreOption'] : '';
                updateScore($memberId,$score,$songId,$round,$scoreOption);
            } else if ($action ==='insertChallengeInfo') {
                $allSingers = isset($_POST['allSingers']) ? $_POST['allSingers'] : '';
                $chalPlaylistOptions = isset($_POST['chalOptions']) ? $_POST['chalOptions'] : '';
                $chalPlaylistId = isset($_POST['playlists']) ? $_POST['playlists'] : '';
                $noOfSongs = isset($_POST['noOfSongs']) ? $_POST['noOfSongs'] : '';
                $scoreOption = isset($_POST['scoreOption']) ? $_POST['scoreOption'] : '';
                $_SESSION['allSingers'] = explode(',',$allSingers);
                insertChallengeInfo($memberId,$allSingers,$chalPlaylistOptions,$chalPlaylistId,$noOfSongs,$scoreOption);                 
            } else if ($action ==='repeatChallenge'){
                repeatChallenge($memberId);
            } else if ($action ==='endChallenge') {
                $scoreOption = isset($_REQUEST['scoreOption']) ? $_REQUEST['scoreOption'] : '';
                endChallenge($memberId,$scoreOption);
            } else if ($action ==='deleteChallenge') {
                unset($_SESSION['allSingers']);
                deleteChallenge($memberId); 
            } else if ( $action === "newChallenge"){
                unset($_SESSION['allSingers']);
                newChallenge($memberId); 
            }
            else {
                showAllPlaylists($memberId); 
            }
        } else {
            showAllPlaylists($memberId); 
        } 
        
    } else if ($action === 'register') {
        $username = isset($_POST['loginNew']) ? $_POST['loginNew'] : '';
        $pass1 = isset($_POST['pwd']) ? $_POST['pwd'] : '';
        $pass2 = isset($_POST['pwdConf']) ? $_POST['pwdConf'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        signUp($email,$username,$pass1,$pass2);
    } else if ($action === 'login') {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        signIn($username,$password);
    } else {
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        $status = isset($_GET['success']) ? $_GET['success'] : '';
        showLandingPage($error,$status);
    }
}
    catch(PDOException $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/errorPDO.php');
    }
    catch(Exception $e) {
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        require('./view/error.php');
    }
