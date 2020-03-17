<?php
session_start();
    require("./controller/controller.php");
    /**
     * TODO: verify cookies, if cookies set, showAllPlaylists, if not showLandingPage
     */

    try {
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            if ($action === 'showMyList') {
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                showAllPlaylists(1); 
            } else if ($action === 'register') {
                $username = isset($_POST['loginNew']) ? $_POST['loginNew'] : '';
                $pass1 = isset($_POST['pwd']) ? $_POST['pwd'] : '';
                $pass2 = isset($_POST['pwdConf']) ? $_POST['pwdConf'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $error = isset($_GET['error']) ? $_GET['error'] : '';
                signUp($email,$username,$pass1,$pass2,$error);
            } else if ($action === 'login'){
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $error = isset($_GET['error']) ? $_GET['error'] : '';
                $status = isset($_GET['success']) ? $_GET['success'] : '';
                logIn($username,$password,$error,$status);
            } else if ($action === 'newPlaylist') {
                if (isset($_SESSION['username']) && isset($_POST['playlistName']) && $_POST['playlistName'] !== '') {
                    makePlaylist($_SESSION['username'], $_POST['playlistName']);
                }
            } else {
                throw new PDOException("issue with showAllPlaylists(username) - unable to fetch the playlists!");
            }
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
    



